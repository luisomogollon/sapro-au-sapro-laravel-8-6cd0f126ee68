<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\BulkDestroyCliente;
use App\Http\Requests\Admin\Cliente\DestroyCliente;
use App\Http\Requests\Admin\Cliente\IndexCliente;
use App\Http\Requests\Admin\Cliente\StoreCliente;
use App\Http\Requests\Admin\Cliente\UpdateCliente;
use App\Models\Cliente;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Comisione;
use App\Models\presentacione;

class ClientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCliente $request
     * @return array|Factory|View
     */
    public function index(IndexCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cliente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['cliente_correo', 'cliente_nombre', 'cliente_rif', 'cliente_telf', 'cliente_tipo', 'comision_id', 'enabled', 'id', 'presentacion_id', 'user_id'],

            // set columns to searchIn
            ['cliente_correo', 'cliente_nombre', 'cliente_rif', 'cliente_telf', 'cliente_tipo', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cliente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cliente.create');
  
        return view('admin.cliente.create'
        ,[
            "presentaciones"=>Presentacione::all()
            ,"comisiones" => Comisione::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCliente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['presentacion_id'] = $request->getPresentacionId();
        $sanitized['comision_id'] = $request->getComisionId();
        // Store the Cliente
        $cliente = Cliente::create($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/clientes')
                , 'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ];
        }

        return redirect('admin/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('admin.cliente.show', $cliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('admin.cliente.edit', $cliente);
        $cliente->load(['comisiones','presentaciones']);

        return view('admin.cliente.edit', [
            'cliente' => $cliente
            ,"presentaciones"=>Presentacione::all()
            ,"comisiones" => Comisione::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCliente $request
     * @param Cliente $cliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCliente $request, Cliente $cliente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['presentacion_id'] = $request->getPresentacionId() ?? $cliente->presentacion_id;
        $sanitized['comision_id'] = $request->getComisionId() ?? $cliente->comision_id;
        // Update changed values Cliente
        $cliente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCliente $request
     * @param Cliente $cliente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCliente $request, Cliente $cliente)
    {
        $cliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCliente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCliente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Cliente::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
