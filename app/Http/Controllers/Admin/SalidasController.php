<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Salida\BulkDestroySalida;
use App\Http\Requests\Admin\Salida\DestroySalida;
use App\Http\Requests\Admin\Salida\IndexSalida;
use App\Http\Requests\Admin\Salida\StoreSalida;
use App\Http\Requests\Admin\Salida\UpdateSalida;
use App\Models\Salida;
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
use App\Models\Lingote;
use App\Models\Colectore;
use App\Models\SalidaEstado;
use App\Models\Cliente;


class SalidasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSalida $request
     * @return array|Factory|View
     */
    public function index(IndexSalida $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Salida::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'salida_referencia', 'activated', 'salida_descripcion', 'colector_id', 'salida_estado_id', 'created_by_admin_user_id', 'updated_by_admin_user_id', 'user_id', 'created_at'],

            // set columns to searchIn
            ['id', 'salida_descripcion'],
            function ($query) use ($request) {
                $query->with(['createdByAdminUser', 'updatedByAdminUser','lingotes']);
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

        return view('admin.salida.index',
        ['data' => $data
        ,'clientes'=> Cliente::whereHas('lingotes')->get()
        ,'lingotes' => Lingote::where('salida_id','=',null)->where('lingote_estado_id','=',4)->get()
        ,'colectores' => Colectore::all()
        ,'salidaEstado' => SalidaEstado::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Cliente $cliente)
    {
        $this->authorize('admin.salida.create');

        return view('admin.salida.create',['lingotes' => $cliente->lingotes
                                                      ,'colectores' => $cliente->colectores
                                                      ,'cliente' => $cliente
                                                      ,'salidaEstado' => SalidaEstado::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSalida $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSalida $request)
    {
        // Sanitize input

        // Store the Salida
        DB::transaction(static function () use ($request) {
            $sanitized = $request->getSanitized();
            $sanitized['colector_id'] = $request->getColectorId();
            $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
            $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
            $sanitized['lingotes'] = $request->getLingotes();
            $salida = Salida::create($sanitized);
            $lingotes = Lingote::whereIn('id',$request->getLingotes())->get();
            $salida->lingotes()->saveMany($lingotes);
        });

        if ($request->ajax()) {
            return ['redirect' => url('admin/salidas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/salidas');
    }

    /**
     * Display the specified resource.
     *
     * @param Salida $salida
     * @throws AuthorizationException
     * @return void
     */
    public function show(Salida $salida)
    {
        $this->authorize('admin.salida.show', $salida);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Salida $salida
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Salida $salida)
    {
        $this->authorize('admin.salida.edit', $salida);

        $salida->load(['createdByAdminUser', 'updatedByAdminUser', 'lingotes','colectores']);

        return view('admin.salida.edit', [
            'salida' => $salida,
            'lingotes' => Lingote::where('salida_id','=',null)
                        ->where('lingote_estado_id','=',4)->get()
                        ,'colectores' => Colectore::all()
                        ,'salidaEstado' => SalidaEstado::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSalida $request
     * @param Salida $salida
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSalida $request, Salida $salida)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['colector_id'] = $request->getColectorId()?? $salida->colector_id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;

        // Update changed values Salida
        $salida->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/salidas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/salidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySalida $request
     * @param Salida $salida
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySalida $request, Salida $salida)
    {
        $salida->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySalida $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySalida $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Salida::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
