<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lingote\BulkDestroyLingote;
use App\Http\Requests\Admin\Lingote\DestroyLingote;
use App\Http\Requests\Admin\Lingote\IndexLingote;
use App\Http\Requests\Admin\Lingote\StoreLingote;
use App\Http\Requests\Admin\Lingote\UpdateLingote;
use App\Models\Lingote;
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

class LingotesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLingote $request
     * @return array|Factory|View
     */
    public function index(IndexLingote $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Lingote::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'lingote_peso', 'lingote_troquelado_codigo', 'salida_id', 'presentacion_id', 'lingote_estado_id', 'updated_by_admin_user_id', 'user_id', 'updated_at', 'lingote_descripcion'],

            // set columns to searchIn
            ['id', 'lingote_troquelado_codigo', 'lingote_descripcion'],
            function ($query) use ($request) {
                $query->with(['updatedByAdminUser']);
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

        return view('admin.lingote.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.lingote.create');

        return view('admin.lingote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLingote $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLingote $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
            $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    
        // Store the Lingote
        $lingote = Lingote::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lingotes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lingotes');
    }

    /**
     * Display the specified resource.
     *
     * @param Lingote $lingote
     * @throws AuthorizationException
     * @return void
     */
    public function show(Lingote $lingote)
    {
        $this->authorize('admin.lingote.show', $lingote);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lingote $lingote
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Lingote $lingote)
    {
        $this->authorize('admin.lingote.edit', $lingote);

        $lingote->load('updatedByAdminUser');
    
        return view('admin.lingote.edit', [
            'lingote' => $lingote,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLingote $request
     * @param Lingote $lingote
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLingote $request, Lingote $lingote)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;

        // Update changed values Lingote
        $lingote->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lingotes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lingotes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLingote $request
     * @param Lingote $lingote
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLingote $request, Lingote $lingote)
    {
        $lingote->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLingote $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLingote $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Lingote::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
