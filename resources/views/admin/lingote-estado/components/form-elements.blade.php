<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lingote_estado_nombre'), 'has-success': fields.lingote_estado_nombre && fields.lingote_estado_nombre.valid }">
    <label for="lingote_estado_nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote-estado.columns.lingote_estado_nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lingote_estado_nombre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lingote_estado_nombre'), 'form-control-success': fields.lingote_estado_nombre && fields.lingote_estado_nombre.valid}" id="lingote_estado_nombre" name="lingote_estado_nombre" placeholder="{{ trans('admin.lingote-estado.columns.lingote_estado_nombre') }}">
        <div v-if="errors.has('lingote_estado_nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lingote_estado_nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lingote_estado_descripcion'), 'has-success': fields.lingote_estado_descripcion && fields.lingote_estado_descripcion.valid }">
    <label for="lingote_estado_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lingote-estado.columns.lingote_estado_descripcion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lingote_estado_descripcion" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lingote_estado_descripcion'), 'form-control-success': fields.lingote_estado_descripcion && fields.lingote_estado_descripcion.valid}" id="lingote_estado_descripcion" name="lingote_estado_descripcion" placeholder="{{ trans('admin.lingote-estado.columns.lingote_estado_descripcion') }}">
        <div v-if="errors.has('lingote_estado_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lingote_estado_descripcion') }}</div>
    </div>
</div>


