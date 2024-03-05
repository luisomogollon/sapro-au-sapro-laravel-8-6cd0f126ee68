<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalidaEstado\BulkDestroySalidaEstado;
use App\Http\Requests\Admin\SalidaEstado\DestroySalidaEstado;
use App\Http\Requests\Admin\SalidaEstado\IndexSalidaEstado;
use App\Http\Requests\Admin\SalidaEstado\StoreSalidaEstado;
use App\Http\Requests\Admin\SalidaEstado\UpdateSalidaEstado;
use App\Models\SalidaEstado;
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

class SalidaEstadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSalidaEstado $request
     * @return array|Factory|View
     */
    public function index(IndexSalidaEstado $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SalidaEstado::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'salida_estado_nombre'],

            // set columns to searchIn
            ['id', 'salida_estado_nombre', 'salida_estado_descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.salida-estado.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.salida-estado.create');

        return view('admin.salida-estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSalidaEstado $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSalidaEstado $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SalidaEstado
        $salidaEstado = SalidaEstado::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/salida-estados'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/salida-estados');
    }

    /**
     * Display the specified resource.
     *
     * @param SalidaEstado $salidaEstado
     * @throws AuthorizationException
     * @return void
     */
    public function show(SalidaEstado $salidaEstado)
    {
        $this->authorize('admin.salida-estado.show', $salidaEstado);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SalidaEstado $salidaEstado
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SalidaEstado $salidaEstado)
    {
        $this->authorize('admin.salida-estado.edit', $salidaEstado);


        return view('admin.salida-estado.edit', [
            'salidaEstado' => $salidaEstado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSalidaEstado $request
     * @param SalidaEstado $salidaEstado
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSalidaEstado $request, SalidaEstado $salidaEstado)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SalidaEstado
        $salidaEstado->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/salida-estados'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/salida-estados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySalidaEstado $request
     * @param SalidaEstado $salidaEstado
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySalidaEstado $request, SalidaEstado $salidaEstado)
    {
        $salidaEstado->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySalidaEstado $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySalidaEstado $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SalidaEstado::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
