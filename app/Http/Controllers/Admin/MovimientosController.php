<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movimiento\BulkDestroyMovimiento;
use App\Http\Requests\Admin\Movimiento\DestroyMovimiento;
use App\Http\Requests\Admin\Movimiento\IndexMovimiento;
use App\Http\Requests\Admin\Movimiento\StoreMovimiento;
use App\Http\Requests\Admin\Movimiento\UpdateMovimiento;
use App\Models\Movimiento;
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
use Modules\Bancos\Events\MovimientoTrue;

class MovimientosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMovimiento $request
     * @return array|Factory|View
     */
    public function index(IndexMovimiento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Movimiento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['activated', 'banco_id', 'barra_id', 'id', 'movimiento_cifra', 'movimiento_codigo', 'movimiento_tipo', 'user_id'],

            // set columns to searchIn
            ['id', 'movimiento_codigo', 'movimiento_tipo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.movimiento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.movimiento.create');

        return view('admin.movimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMovimiento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMovimiento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Movimiento
        $movimiento = Movimiento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/movimientos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/movimientos');
    }

    /**
     * Display the specified resource.
     *
     * @param Movimiento $movimiento
     * @throws AuthorizationException
     * @return void
     */
    public function show(Movimiento $movimiento)
    {
        $this->authorize('admin.movimiento.show', $movimiento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movimiento $movimiento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Movimiento $movimiento)
    {
        $this->authorize('admin.movimiento.edit', $movimiento);


        return view('admin.movimiento.edit', [
            'movimiento' => $movimiento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMovimiento $request
     * @param Movimiento $movimiento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMovimiento $request, Movimiento $movimiento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Movimiento
        $movimiento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/movimientos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }
       // event(new MovimientoTrue($movimiento));
        return redirect('admin/movimientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMovimiento $request
     * @param Movimiento $movimiento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMovimiento $request, Movimiento $movimiento)
    {
        $movimiento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMovimiento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMovimiento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Movimiento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
