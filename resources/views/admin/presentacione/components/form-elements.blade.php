<div class="form-group row align-items-center" :class="{'has-danger': errors.has('presentacion_nombre'), 'has-success': fields.presentacion_nombre && fields.presentacion_nombre.valid }">
    <label for="presentacion_nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.presentacione.columns.presentacion_nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.presentacion_nombre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('presentacion_nombre'), 'form-control-success': fields.presentacion_nombre && fields.presentacion_nombre.valid}" id="presentacion_nombre" name="presentacion_nombre" placeholder="{{ trans('admin.presentacione.columns.presentacion_nombre') }}">
        <div v-if="errors.has('presentacion_nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('presentacion_nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('presentacion_peso'), 'has-success': fields.presentacion_peso && fields.presentacion_peso.valid }">
    <label for="presentacion_peso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.presentacione.columns.presentacion_peso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.presentacion_peso" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('presentacion_peso'), 'form-control-success': fields.presentacion_peso && fields.presentacion_peso.valid}" id="presentacion_peso" name="presentacion_peso" placeholder="{{ trans('admin.presentacione.columns.presentacion_peso') }}">
        <div v-if="errors.has('presentacion_peso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('presentacion_peso') }}</div>
    </div>
</div>




