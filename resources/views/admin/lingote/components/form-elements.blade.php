<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lingote_peso'), 'has-success': fields.lingote_peso && fields.lingote_peso.valid }">
    <label for="lingote_peso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.lingote_peso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lingote_peso" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lingote_peso'), 'form-control-success': fields.lingote_peso && fields.lingote_peso.valid}" id="lingote_peso" name="lingote_peso" placeholder="{{ trans('admin.lingote.columns.lingote_peso') }}">
        <div v-if="errors.has('lingote_peso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lingote_peso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lingote_troquelado_codigo'), 'has-success': fields.lingote_troquelado_codigo && fields.lingote_troquelado_codigo.valid }">
    <label for="lingote_troquelado_codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.lingote_troquelado_codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lingote_troquelado_codigo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lingote_troquelado_codigo'), 'form-control-success': fields.lingote_troquelado_codigo && fields.lingote_troquelado_codigo.valid}" id="lingote_troquelado_codigo" name="lingote_troquelado_codigo" placeholder="{{ trans('admin.lingote.columns.lingote_troquelado_codigo') }}">
        <div v-if="errors.has('lingote_troquelado_codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lingote_troquelado_codigo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('salida_id'), 'has-success': fields.salida_id && fields.salida_id.valid }">
    <label for="salida_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.salida_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.salida_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('salida_id'), 'form-control-success': fields.salida_id && fields.salida_id.valid}" id="salida_id" name="salida_id" placeholder="{{ trans('admin.lingote.columns.salida_id') }}">
        <div v-if="errors.has('salida_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('salida_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('presentacion_id'), 'has-success': fields.presentacion_id && fields.presentacion_id.valid }">
    <label for="presentacion_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.presentacion_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.presentacion_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('presentacion_id'), 'form-control-success': fields.presentacion_id && fields.presentacion_id.valid}" id="presentacion_id" name="presentacion_id" placeholder="{{ trans('admin.lingote.columns.presentacion_id') }}">
        <div v-if="errors.has('presentacion_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('presentacion_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lingote_estado_id'), 'has-success': fields.lingote_estado_id && fields.lingote_estado_id.valid }">
    <label for="lingote_estado_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.lingote_estado_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lingote_estado_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lingote_estado_id'), 'form-control-success': fields.lingote_estado_id && fields.lingote_estado_id.valid}" id="lingote_estado_id" name="lingote_estado_id" placeholder="{{ trans('admin.lingote.columns.lingote_estado_id') }}">
        <div v-if="errors.has('lingote_estado_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lingote_estado_id') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.lingote.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lingote_descripcion'), 'has-success': fields.lingote_descripcion && fields.lingote_descripcion.valid }">
    <label for="lingote_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote.columns.lingote_descripcion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lingote_descripcion" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lingote_descripcion'), 'form-control-success': fields.lingote_descripcion && fields.lingote_descripcion.valid}" id="lingote_descripcion" name="lingote_descripcion" placeholder="{{ trans('admin.lingote.columns.lingote_descripcion') }}">
        <div v-if="errors.has('lingote_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lingote_descripcion') }}</div>
    </div>
</div>


