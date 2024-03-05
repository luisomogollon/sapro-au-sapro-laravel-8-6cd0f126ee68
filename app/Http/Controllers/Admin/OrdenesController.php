<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ordene\BulkDestroyOrdene;
use App\Http\Requests\Admin\Ordene\DestroyOrdene;
use App\Http\Requests\Admin\Ordene\IndexOrdene;
use App\Http\Requests\Admin\Ordene\StoreOrdene;
use App\Http\Requests\Admin\Ordene\UpdateOrdene;
use App\Models\Ordene;
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

class OrdenesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexOrdene $request
     * @return array|Factory|View
     */
    public function index(IndexOrdene $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ordene::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'orden_referencia', 'cliente_id', 'orden_estado_id', 'orden_tipo', 'comision_id'],

            // set columns to searchIn
            ['id', 'orden_descripcion', 'orden_tipo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ordene.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ordene.create');

        return view('admin.ordene.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrdene $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreOrdene $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Ordene
        $ordene = Ordene::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ordenes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ordenes');
    }

    /**
     * Display the specified resource.
     *
     * @param Ordene $ordene
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ordene $ordene)
    {
        $this->authorize('admin.ordene.show', $ordene);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ordene $ordene
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ordene $ordene)
    {
        $this->authorize('admin.ordene.edit', $ordene);


        return view('admin.ordene.edit', [
            'ordene' => $ordene,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrdene $request
     * @param Ordene $ordene
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateOrdene $request, Ordene $ordene)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Ordene
        $ordene->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ordenes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ordenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyOrdene $request
     * @param Ordene $ordene
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyOrdene $request, Ordene $ordene)
    {
        $ordene->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyOrdene $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyOrdene $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ordene::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
