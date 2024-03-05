<?php

namespace Modules\Bloque\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Requests\Request;
use Orion\Http\Controllers\Controller;
use Modules\Bloque\Entities\Bloque;
use Orion\Concerns\DisableAuthorization;
use Modules\Bloque\Events\BloqueGranallado;
class BloqueController extends Controller
{
    use DisableAuthorization;

    protected $model = Bloque::class;

    protected function alwaysIncludes() : array
    {
        return ['usuario', 'barras', 'bloqueEstado'];
    }

    protected function filterableBy() : array
    {
        return ['id'  
                ,'user.id'
                ,'bloque_peso'
                ,'bloque_oro_cargado'
                ,'bloque_estado_id'
                ,"barras.id"
                ,"barras.barra_estado_id"
                ,"barrasFiltroCeros.barra_peso_banco"
                ,"created_at"
                ,"inconformidad.activated"
                ,"inconformidad.id"
            ];
    }

    public function store(Request $request)
    {
        $resourceModelClass = $this->resolveResourceModelClass();

        $this->authorize('create', $resourceModelClass);

        /**
         * @var Model $entity
         */
        $entity = new $resourceModelClass;

        $beforeHookResult = $this->beforeStore($request, $entity);
        if ($this->hookResponds($beforeHookResult)) {
            return $beforeHookResult;
        }

        $beforeSaveHookResult = $this->beforeSave($request, $entity);
        if ($this->hookResponds($beforeSaveHookResult)) {
            return $beforeSaveHookResult;
        }

        $requestedRelations = $this->relationsResolver->requestedRelations($request);

        $this->performStore(
            $request, $entity, $request->all()
        );

        $entity = $entity->fresh($requestedRelations);
        $entity->wasRecentlyCreated = true;

        $afterSaveHookResult = $this->afterSave($request, $entity);
        if ($this->hookResponds($afterSaveHookResult)) {
            return $afterSaveHookResult;
        }

        $afterHookResult = $this->afterStore($request, $entity);
        if ($this->hookResponds($afterHookResult)) {
            return $afterHookResult;
        }

        $entity = $this->relationsResolver->guardRelations($entity, $requestedRelations);
        if($request->has('barras')){
            $entity->barras()->attach($request->input('barras'));
            $entity->load('barras');
            $entity->calcularMetales();
        }
        return $this->entityResponse($entity);
    }

    public function update(Request $request, $key)
    {
        $requestedRelations = $this->relationsResolver->requestedRelations($request);

        $query = $this->buildUpdateFetchQuery($request, $requestedRelations);
        $entity = $this->runUpdateFetchQuery($request, $query, $key);

        $this->authorize('update', $entity);

        $beforeHookResult = $this->beforeUpdate($request, $entity);
        if ($this->hookResponds($beforeHookResult)) {
            return $beforeHookResult;
        }

        $beforeSaveHookResult = $this->beforeSave($request, $entity);
        if ($this->hookResponds($beforeSaveHookResult)) {
            return $beforeSaveHookResult;
        }

        $this->performUpdate(
            $request, $entity, $request->all()
        );

        $entity = $entity->fresh($requestedRelations);

        $afterSaveHookResult = $this->afterSave($request, $entity);
        if ($this->hookResponds($afterSaveHookResult)) {
            return $afterSaveHookResult;
        }

        $afterHookResult = $this->afterUpdate($request, $entity);
        if ($this->hookResponds($afterHookResult)) {
            return $afterHookResult;
        }

        $entity = $this->relationsResolver->guardRelations($entity, $requestedRelations);
       // event(new BloqueGranallado($entity));
        return $this->entityResponse($entity);
    }

}
