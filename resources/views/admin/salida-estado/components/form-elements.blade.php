<div class="form-group row align-items-center" :class="{'has-danger': errors.has('salida_estado_nombre'), 'has-success': fields.salida_estado_nombre && fields.salida_estado_nombre.valid }">
    <label for="salida_estado_nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida-estado.columns.salida_estado_nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.salida_estado_nombre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('salida_estado_nombre'), 'form-control-success': fields.salida_estado_nombre && fields.salida_estado_nombre.valid}" id="salida_estado_nombre" name="salida_estado_nombre" placeholder="{{ trans('admin.salida-estado.columns.salida_estado_nombre') }}">
        <div v-if="errors.has('salida_estado_nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('salida_estado_nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('salida_estado_descripcion'), 'has-success': fields.salida_estado_descripcion && fields.salida_estado_descripcion.valid }">
    <label for="salida_estado_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida-estado.columns.salida_estado_descripcion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.salida_estado_descripcion" v-validate="''" id="salida_estado_descripcion" name="salida_estado_descripcion"></textarea>
        </div>
        <div v-if="errors.has('salida_estado_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('salida_estado_descripcion') }}</div>
    </div>
</div>


