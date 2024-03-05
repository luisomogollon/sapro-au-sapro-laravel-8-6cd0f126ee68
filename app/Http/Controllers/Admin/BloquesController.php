<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bloque\BulkDestroyBloque;
use App\Http\Requests\Admin\Bloque\DestroyBloque;
use App\Http\Requests\Admin\Bloque\IndexBloque;
use App\Http\Requests\Admin\Bloque\StoreBloque;
use App\Http\Requests\Admin\Bloque\UpdateBloque;
use App\Models\Bloque;
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

class BloquesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBloque $request
     * @return array|Factory|View
     */
    public function index(IndexBloque $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Bloque::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['bloque_estado_id', 'bloque_oro_cargado', 'bloque_oro_granalla', 'bloque_oro_ley', 'bloque_oro_ley_real', 'bloque_oro_resultado', 'bloque_otros_cargado', 'bloque_otros_resultado', 'bloque_peso', 'bloque_plata_cargado', 'bloque_plata_resultado', 'id', 'user_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.bloque.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.bloque.create');

        return view('admin.bloque.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBloque $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBloque $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Bloque
        $bloque = Bloque::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/bloques'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/bloques');
    }

    /**
     * Display the specified resource.
     *
     * @param Bloque $bloque
     * @throws AuthorizationException
     * @return void
     */
    public function show(Bloque $bloque)
    {
        $this->authorize('admin.bloque.show', $bloque);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bloque $bloque
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Bloque $bloque)
    {
        $this->authorize('admin.bloque.edit', $bloque);


        return view('admin.bloque.edit', [
            'bloque' => $bloque,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBloque $request
     * @param Bloque $bloque
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBloque $request, Bloque $bloque)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Bloque
        $bloque->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/bloques'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/bloques');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBloque $request
     * @param Bloque $bloque
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBloque $request, Bloque $bloque)
    {
        $bloque->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBloque $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBloque $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Bloque::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
