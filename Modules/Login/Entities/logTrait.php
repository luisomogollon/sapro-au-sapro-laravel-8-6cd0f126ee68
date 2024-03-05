<?php
namespace Modules\Login\Entities;

trait logTrait {
    public function actualizando ($model){
        $changed = [];

        foreach ($model->getOriginal() as $key => $value) {
            $nuevo =$model->getAttributes()[$key] ?? null;
            $anterior = array_key_exists($key,$model->getOriginal()) ? 
            $model->getOriginal()[$key] : 'vacio';
            if ($nuevo !=$anterior) {
                    if ($nuevo??0) {
                        $changed[$key]['anterior'] = $anterior;
                        $changed[$key]['nuevo'] = $nuevo;
                    }else {
                        $changed[$key]['anterior'] = $nuevo;
                        $changed[$key]['nuevo'] = $anterior;
                    }

                }
                
        }

        return json_encode($changed);
    }
}