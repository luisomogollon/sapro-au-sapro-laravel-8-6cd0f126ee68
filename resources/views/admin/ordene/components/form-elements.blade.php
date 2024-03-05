<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden_referencia'), 'has-success': fields.orden_referencia && fields.orden_referencia.valid }">
    <label for="orden_referencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ordene.columns.orden_referencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden_referencia" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden_referencia'), 'form-control-success': fields.orden_referencia && fields.orden_referencia.valid}" id="orden_referencia" name="orden_referencia" placeholder="{{ trans('admin.ordene.columns.orden_referencia') }}">
        <div v-if="errors.has('orden_referencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden_referencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden_descripcion'), 'has-success': fields.orden_descripcion && fields.orden_descripcion.valid }">
    <label for="orden_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ordene.columns.orden_descripcion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.orden_descripcion" v-validate="''" id="orden_descripcion" name="orden_descripcion"></textarea>
        </div>
        <div v-if="errors.has('orden_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden_descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_id'), 'has-success': fields.cliente_id && fields.cliente_id.valid }">
    <label for="cliente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ordene.columns.cliente_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_id'), 'form-control-success': fields.cliente_id && fields.cliente_id.valid}" id="cliente_id" name="cliente_id" placeholder="{{ trans('admin.ordene.columns.cliente_id') }}">
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden_estado_id'), 'has-success': fields.orden_estado_id && fields.orden_estado_id.valid }">
    <label for="orden_estado_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ordene.columns.orden_estado_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden_estado_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden_estado_id'), 'form-control-success': fields.orden_estado_id && fields.orden_estado_id.valid}" id="orden_estado_id" name="orden_estado_id" placeholder="{{ trans('admin.ordene.columns.orden_estado_id') }}">
        <div v-if="errors.has('orden_estado_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden_estado_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden_tipo'), 'has-success': fields.orden_tipo && fields.orden_tipo.valid }">
    <label for="orden_tipo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ordene.columns.orden_tipo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden_tipo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden_tipo'), 'form-control-success': fields.orden_tipo && fields.orden_tipo.valid}" id="orden_tipo" name="orden_tipo" placeholder="{{ trans('admin.ordene.columns.orden_tipo') }}">
        <div v-if="errors.has('orden_tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden_tipo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comision_id'), 'has-success': fields.comision_id && fields.comision_id.valid }">
    <label for="comision_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ordene.columns.comision_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comision_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comision_id'), 'form-control-success': fields.comision_id && fields.comision_id.valid}" id="comision_id" name="comision_id" placeholder="{{ trans('admin.ordene.columns.comision_id') }}">
        <div v-if="errors.has('comision_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_id') }}</div>
    </div>
</div>


