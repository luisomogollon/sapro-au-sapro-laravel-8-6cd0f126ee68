<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comisione\BulkDestroyComisione;
use App\Http\Requests\Admin\Comisione\DestroyComisione;
use App\Http\Requests\Admin\Comisione\IndexComisione;
use App\Http\Requests\Admin\Comisione\StoreComisione;
use App\Http\Requests\Admin\Comisione\UpdateComisione;
use App\Models\Comisione;
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

class ComisionesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexComisione $request
     * @return array|Factory|View
     */
    public function index(IndexComisione $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Comisione::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['comision_cvm', 'comision_descripcion', 'comision_monto', 'comision_planta', 'created_at', 'created_by_admin_user_id', 'id', 'updated_by_admin_user_id'],

            // set columns to searchIn
            ['comision_descripcion', 'id'],
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

        return view('admin.comisione.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.comisione.create');

        return view('admin.comisione.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreComisione $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreComisione $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    
        // Store the Comisione
        $comisione = Comisione::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/comisiones'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/comisiones');
    }

    /**
     * Display the specified resource.
     *
     * @param Comisione $comisione
     * @throws AuthorizationException
     * @return void
     */
    public function show(Comisione $comisione)
    {
        $this->authorize('admin.comisione.show', $comisione);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comisione $comisione
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Comisione $comisione)
    {
        $this->authorize('admin.comisione.edit', $comisione);

        $comisione->load(['createdByAdminUser', 'updatedByAdminUser']);
    
        return view('admin.comisione.edit', [
            'comisione' => $comisione,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateComisione $request
     * @param Comisione $comisione
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateComisione $request, Comisione $comisione)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;

        // Update changed values Comisione
        $comisione->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/comisiones'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/comisiones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyComisione $request
     * @param Comisione $comisione
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyComisione $request, Comisione $comisione)
    {
        $comisione->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyComisione $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyComisione $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Comisione::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
