<?php

namespace Modules\Ordenes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Requests\Request;
use Modules\Ordenes\Entities\Orden;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;
use Illuminate\Support\Facades\DB;

class OrdenLingotesController extends RelationController
{
    use DisableAuthorization;
    protected $model = Orden::class;
    protected $relation = "lingotes";


    public function store(Request $request, $parentKey)
    {

        $resourceModelClass = $this->resolveResourceModelClass();

        $this->authorize('create', $resourceModelClass);

        $parentQuery = $this->buildStoreParentFetchQuery($request, $parentKey);
        $parentEntity = $this->runStoreParentFetchQuery($request, $parentQuery, $parentKey);

        /** @var Model $entity */
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
            $request, $parentEntity, $entity, $request->all(), $request->get('pivot', [])
        );

        $entity = $this->newRelationQuery($parentEntity)->with($requestedRelations)->find($entity->id);
        $entity->wasRecentlyCreated = true;

        $entity = $this->cleanupEntity($entity);

        if (count($this->getPivotJson())) {
            $entity = $this->castPivotJsonFields($entity);
        }

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
            $entity->barraLingote()->attach($request->input('barras'));
            $entity->load('barraLingote');
        }
        return $this->entityResponse($entity);
    }
}
