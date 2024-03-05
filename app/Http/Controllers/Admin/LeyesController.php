<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Leye\BulkDestroyLeye;
use App\Http\Requests\Admin\Leye\DestroyLeye;
use App\Http\Requests\Admin\Leye\IndexLeye;
use App\Http\Requests\Admin\Leye\StoreLeye;
use App\Http\Requests\Admin\Leye\UpdateLeye;
use App\Models\Leye;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LeyesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLeye $request
     * @return array|Factory|View
     */
    public function index(IndexLeye $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Leye::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['created_at', 'created_by_admin_user_id', 'id', 'ley_margen', 'updated_by_admin_user_id'],

            // set columns to searchIn
            ['id'],
            function ($query) use ($request) {
                $query->with(['createdByAdminUser', 'updatedByAdminUser']);
            }
            );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.leye.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.leye.create');

        return view('admin.leye.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLeye $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLeye $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    
        // Store the Leye
        $leye = Leye::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/leyes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/leyes');
    }

    /**
     * Display the specified resource.
     *
     * @param Leye $leye
     * @throws AuthorizationException
     * @return void
     */
    public function show(Leye $leye)
    {
        $this->authorize('admin.leye.show', $leye);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Leye $leye
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Leye $leye)
    {
        $this->authorize('admin.leye.edit', $leye);

        $leye->load(['createdByAdminUser', 'updatedByAdminUser']);
    
        return view('admin.leye.edit', [
            'leye' => $leye,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLeye $request
     * @param Leye $leye
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLeye $request, Leye $leye)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;

        // Update changed values Leye
        $leye->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/leyes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/leyes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLeye $request
     * @param Leye $leye
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLeye $request, Leye $leye)
    {
        $leye->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLeye $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLeye $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Leye::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
