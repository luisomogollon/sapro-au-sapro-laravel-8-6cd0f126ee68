<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Viruta\BulkDestroyViruta;
use App\Http\Requests\Admin\Viruta\DestroyViruta;
use App\Http\Requests\Admin\Viruta\IndexViruta;
use App\Http\Requests\Admin\Viruta\StoreViruta;
use App\Http\Requests\Admin\Viruta\UpdateViruta;
use App\Models\Viruta;
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

class VirutasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexViruta $request
     * @return array|Factory|View
     */
    public function index(IndexViruta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Viruta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['created_at', 'created_by_admin_user_id', 'id', 'updated_by_admin_user_id', 'viruta_muestra'],

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

        return view('admin.viruta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.viruta.create');

        return view('admin.viruta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreViruta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreViruta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    
        // Store the Viruta
        $virutum = Viruta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/virutas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/virutas');
    }

    /**
     * Display the specified resource.
     *
     * @param Viruta $virutum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Viruta $virutum)
    {
        $this->authorize('admin.viruta.show', $virutum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Viruta $virutum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Viruta $virutum)
    {
        $this->authorize('admin.viruta.edit', $virutum);

        $virutum->load(['createdByAdminUser', 'updatedByAdminUser']);
    
        return view('admin.viruta.edit', [
            'virutum' => $virutum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateViruta $request
     * @param Viruta $virutum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateViruta $request, Viruta $virutum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;

        // Update changed values Viruta
        $virutum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/virutas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/virutas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyViruta $request
     * @param Viruta $virutum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyViruta $request, Viruta $virutum)
    {
        $virutum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyViruta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyViruta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Viruta::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
