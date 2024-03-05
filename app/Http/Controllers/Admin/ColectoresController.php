<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Colectore\BulkDestroyColectore;
use App\Http\Requests\Admin\Colectore\DestroyColectore;
use App\Http\Requests\Admin\Colectore\IndexColectore;
use App\Http\Requests\Admin\Colectore\StoreColectore;
use App\Http\Requests\Admin\Colectore\UpdateColectore;
use App\Models\Colectore;
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
use Modules\Clientes\Entities\Cliente;
class ColectoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexColectore $request
     * @return array|Factory|View
     */
    public function index(IndexColectore $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Colectore::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'colector_nombres', 'colector_apellidos', 'colector_cedula', 'created_by_admin_user_id', 'updated_by_admin_user_id', 'created_at'],

            // set columns to searchIn
            ['id', 'colector_nombres', 'colector_apellidos', 'colector_cedula'],
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

        return view('admin.colectore.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.colectore.create');

        return view('admin.colectore.create',[
            'mode'=>'create'
            ,'clientes'=>Cliente::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreColectore $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreColectore $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['cliente_id'] = $request->getClienteId();
    
        // Store the Colectore
        $colectore = Colectore::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/colectores'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/colectores');
    }

    /**
     * Display the specified resource.
     *
     * @param Colectore $colectore
     * @throws AuthorizationException
     * @return void
     */
    public function show(Colectore $colectore)
    {
        $this->authorize('admin.colectore.show', $colectore,['mode'=>'edit']);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Colectore $colectore
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Colectore $colectore)
    {
        $this->authorize('admin.colectore.edit', $colectore);

        $colectore->load(['createdByAdminUser', 'updatedByAdminUser', 'cliente']);
    
        return view('admin.colectore.edit', [
            'colectore' => $colectore,
            'mode'=>'edit',
            'clientes'=> Cliente::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateColectore $request
     * @param Colectore $colectore
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateColectore $request, Colectore $colectore)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['cliente_id'] = $request->getClienteId();
        // Update changed values Colectore
        $colectore->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/colectores'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/colectores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyColectore $request
     * @param Colectore $colectore
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyColectore $request, Colectore $colectore)
    {
        $colectore->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyColectore $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyColectore $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Colectore::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
