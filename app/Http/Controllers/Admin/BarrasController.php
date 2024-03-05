<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Barra\BulkDestroyBarra;
use App\Http\Requests\Admin\Barra\DestroyBarra;
use App\Http\Requests\Admin\Barra\IndexBarra;
use App\Http\Requests\Admin\Barra\StoreBarra;
use App\Http\Requests\Admin\Barra\UpdateBarra;
use App\Models\Barra;
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

class BarrasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBarra $request
     * @return array|Factory|View
     */
    public function index(IndexBarra $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Barra::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['barra_codigo', 'barra_estado_id', 'barra_ley_final', 'barra_ley_ingreso', 'barra_muestra', 'barra_peso_banco', 'barra_peso_granalla', 'barra_peso_ingreso', 'barra_ultimo_peso', 'barra_und_masa', 'id', 'orden_id', 'user_id'],

            // set columns to searchIn
            ['barra_codigo', 'barra_descripcion_operacion', 'barra_und_masa', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.barra.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.barra.create');

        return view('admin.barra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBarra $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBarra $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Barra
        $barra = Barra::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/barras'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/barras');
    }

    /**
     * Display the specified resource.
     *
     * @param Barra $barra
     * @throws AuthorizationException
     * @return void
     */
    public function show(Barra $barra)
    {
        $this->authorize('admin.barra.show', $barra);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Barra $barra
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Barra $barra)
    {
        $this->authorize('admin.barra.edit', $barra);


        return view('admin.barra.edit', [
            'barra' => $barra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBarra $request
     * @param Barra $barra
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBarra $request, Barra $barra)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Barra
        $barra->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/barras'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/barras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBarra $request
     * @param Barra $barra
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBarra $request, Barra $barra)
    {
        $barra->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBarra $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBarra $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Barra::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
