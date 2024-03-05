<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Presentacione\BulkDestroyPresentacione;
use App\Http\Requests\Admin\Presentacione\DestroyPresentacione;
use App\Http\Requests\Admin\Presentacione\IndexPresentacione;
use App\Http\Requests\Admin\Presentacione\StorePresentacione;
use App\Http\Requests\Admin\Presentacione\UpdatePresentacione;
use App\Models\Presentacione;
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

class PresentacionesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPresentacione $request
     * @return array|Factory|View
     */
    public function index(IndexPresentacione $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Presentacione::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'presentacion_nombre', 'presentacion_peso', 'created_by_admin_user_id', 'updated_by_admin_user_id', 'created_at'],

            // set columns to searchIn
            ['id', 'presentacion_nombre'],
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

        return view('admin.presentacione.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.presentacione.create');

        return view('admin.presentacione.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePresentacione $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePresentacione $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    
        // Store the Presentacione
        $presentacione = Presentacione::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/presentaciones'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/presentaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param Presentacione $presentacione
     * @throws AuthorizationException
     * @return void
     */
    public function show(Presentacione $presentacione)
    {
        $this->authorize('admin.presentacione.show', $presentacione);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Presentacione $presentacione
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Presentacione $presentacione)
    {
        $this->authorize('admin.presentacione.edit', $presentacione);

        $presentacione->load(['createdByAdminUser', 'updatedByAdminUser']);
    
        return view('admin.presentacione.edit', [
            'presentacione' => $presentacione,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePresentacione $request
     * @param Presentacione $presentacione
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePresentacione $request, Presentacione $presentacione)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;

        // Update changed values Presentacione
        $presentacione->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/presentaciones'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/presentaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPresentacione $request
     * @param Presentacione $presentacione
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPresentacione $request, Presentacione $presentacione)
    {
        $presentacione->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPresentacione $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPresentacione $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Presentacione::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
