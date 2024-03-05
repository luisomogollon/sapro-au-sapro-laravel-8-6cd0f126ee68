<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Metale\BulkDestroyMetale;
use App\Http\Requests\Admin\Metale\DestroyMetale;
use App\Http\Requests\Admin\Metale\IndexMetale;
use App\Http\Requests\Admin\Metale\StoreMetale;
use App\Http\Requests\Admin\Metale\UpdateMetale;
use App\Models\Metale;
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

class MetalesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMetale $request
     * @return array|Factory|View
     */
    public function index(IndexMetale $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Metale::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'metal_codigo', 'metal_nombre', 'metal_simbolo', 'user_id'],

            // set columns to searchIn
            ['id', 'metal_codigo', 'metal_descripcion', 'metal_nombre', 'metal_simbolo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.metale.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.metale.create');

        return view('admin.metale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMetale $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMetale $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Metale
        $metale = Metale::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/metales'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/metales');
    }

    /**
     * Display the specified resource.
     *
     * @param Metale $metale
     * @throws AuthorizationException
     * @return void
     */
    public function show(Metale $metale)
    {
        $this->authorize('admin.metale.show', $metale);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Metale $metale
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Metale $metale)
    {
        $this->authorize('admin.metale.edit', $metale);


        return view('admin.metale.edit', [
            'metale' => $metale,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMetale $request
     * @param Metale $metale
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMetale $request, Metale $metale)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Metale
        $metale->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/metales'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/metales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMetale $request
     * @param Metale $metale
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMetale $request, Metale $metale)
    {
        $metale->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMetale $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMetale $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Metale::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
