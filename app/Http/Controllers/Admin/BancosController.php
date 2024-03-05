<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banco\BulkDestroyBanco;
use App\Http\Requests\Admin\Banco\DestroyBanco;
use App\Http\Requests\Admin\Banco\IndexBanco;
use App\Http\Requests\Admin\Banco\StoreBanco;
use App\Http\Requests\Admin\Banco\UpdateBanco;
use App\Models\Banco;
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

class BancosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBanco $request
     * @return array|Factory|View
     */
    public function index(IndexBanco $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Banco::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'banco_mineral', 'banco_cuenta', 'banco_cantidad_disponible', 'banco_cantidad_retiros', 'banco_cantidad_depositos'],

            // set columns to searchIn
            ['id', 'banco_mineral', 'banco_cuenta']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.banco.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.banco.create');

        return view('admin.banco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBanco $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBanco $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Banco
        $banco = Banco::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/bancos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/bancos');
    }

    /**
     * Display the specified resource.
     *
     * @param Banco $banco
     * @throws AuthorizationException
     * @return void
     */
    public function show(Banco $banco)
    {
        $this->authorize('admin.banco.show', $banco);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Banco $banco
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Banco $banco)
    {
        $this->authorize('admin.banco.edit', $banco);


        return view('admin.banco.edit', [
            'banco' => $banco,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBanco $request
     * @param Banco $banco
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBanco $request, Banco $banco)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Banco
        $banco->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/bancos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/bancos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBanco $request
     * @param Banco $banco
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBanco $request, Banco $banco)
    {
        $banco->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBanco $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBanco $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Banco::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
