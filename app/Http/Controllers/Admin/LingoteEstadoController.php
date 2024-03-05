<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LingoteEstado\BulkDestroyLingoteEstado;
use App\Http\Requests\Admin\LingoteEstado\DestroyLingoteEstado;
use App\Http\Requests\Admin\LingoteEstado\IndexLingoteEstado;
use App\Http\Requests\Admin\LingoteEstado\StoreLingoteEstado;
use App\Http\Requests\Admin\LingoteEstado\UpdateLingoteEstado;
use App\Models\LingoteEstado;
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

class LingoteEstadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLingoteEstado $request
     * @return array|Factory|View
     */
    public function index(IndexLingoteEstado $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LingoteEstado::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'lingote_estado_nombre', 'lingote_estado_descripcion'],

            // set columns to searchIn
            ['id', 'lingote_estado_nombre', 'lingote_estado_descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.lingote-estado.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.lingote-estado.create');

        return view('admin.lingote-estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLingoteEstado $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLingoteEstado $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LingoteEstado
        $lingoteEstado = LingoteEstado::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lingote-estados'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lingote-estados');
    }

    /**
     * Display the specified resource.
     *
     * @param LingoteEstado $lingoteEstado
     * @throws AuthorizationException
     * @return void
     */
    public function show(LingoteEstado $lingoteEstado)
    {
        $this->authorize('admin.lingote-estado.show', $lingoteEstado);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LingoteEstado $lingoteEstado
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LingoteEstado $lingoteEstado)
    {
        $this->authorize('admin.lingote-estado.edit', $lingoteEstado);


        return view('admin.lingote-estado.edit', [
            'lingoteEstado' => $lingoteEstado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLingoteEstado $request
     * @param LingoteEstado $lingoteEstado
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLingoteEstado $request, LingoteEstado $lingoteEstado)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LingoteEstado
        $lingoteEstado->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lingote-estados'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lingote-estados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLingoteEstado $request
     * @param LingoteEstado $lingoteEstado
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLingoteEstado $request, LingoteEstado $lingoteEstado)
    {
        $lingoteEstado->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLingoteEstado $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLingoteEstado $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LingoteEstado::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
