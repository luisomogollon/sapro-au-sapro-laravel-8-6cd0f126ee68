<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_correo'), 'has-success': fields.cliente_correo && fields.cliente_correo.valid }">
    <label for="cliente_correo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cliente_correo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_correo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_correo'), 'form-control-success': fields.cliente_correo && fields.cliente_correo.valid}" id="cliente_correo" name="cliente_correo" placeholder="{{ trans('admin.cliente.columns.cliente_correo') }}">
        <div v-if="errors.has('cliente_correo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_correo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_nombre'), 'has-success': fields.cliente_nombre && fields.cliente_nombre.valid }">
    <label for="cliente_nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cliente_nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_nombre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_nombre'), 'form-control-success': fields.cliente_nombre && fields.cliente_nombre.valid}" id="cliente_nombre" name="cliente_nombre" placeholder="{{ trans('admin.cliente.columns.cliente_nombre') }}">
        <div v-if="errors.has('cliente_nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_rif'), 'has-success': fields.cliente_rif && fields.cliente_rif.valid }">
    <label for="cliente_rif" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cliente_rif') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_rif" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_rif'), 'form-control-success': fields.cliente_rif && fields.cliente_rif.valid}" id="cliente_rif" name="cliente_rif" placeholder="{{ trans('admin.cliente.columns.cliente_rif') }}">
        <div v-if="errors.has('cliente_rif')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_rif') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_telf'), 'has-success': fields.cliente_telf && fields.cliente_telf.valid }">
    <label for="cliente_telf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cliente_telf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_telf" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_telf'), 'form-control-success': fields.cliente_telf && fields.cliente_telf.valid}" id="cliente_telf" name="cliente_telf" placeholder="{{ trans('admin.cliente.columns.cliente_telf') }}">
        <div v-if="errors.has('cliente_telf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_telf') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_tipo'), 'has-success': fields.cliente_tipo && fields.cliente_tipo.valid }">
    <label for="cliente_tipo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cliente_tipo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.cliente_tipo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_tipo'), 'form-control-success': fields.cliente_tipo && fields.cliente_tipo.valid}" id="cliente_tipo" name="cliente_tipo" placeholder="{{ trans('admin.cliente.columns.cliente_tipo') }}">
            <option value="PARTICULAR">PARTICULAR</option>
  <option value="RECEPTOR" selected>RECEPTOR</option>
        </select>
        <div v-if="errors.has('cliente_tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_tipo') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comision_id'), 'has-success': fields.colector_id && fields.colector_id.valid }">
    <label for="comisiones" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.comision_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
        v-model="form.comisiones"
        :options="comisiones"
        :multiple="false"
        track-by="id"
        :searchable="true"
        label="comision_descripcion"
        tag-placeholder="{{ __('Selecione Comision') }}"
        placeholder="{{ __('Comisiones') }}">
        </multiselect>
        <div v-if="errors.has('comision_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.cliente.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div v-if="form.cliente_tipo == 'RECEPTOR'" class="form-group row align-items-center" :class="{'has-danger': errors.has('presentacion_id'), 'has-success': fields.colector_id && fields.colector_id.valid }">
    <label for="presentaciones" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.presentacion_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
        v-model="form.presentaciones"
        :options="presentaciones"
        :multiple="false"
        track-by="id"
        :searchable="true"
        label="presentacion_nombre"
        tag-placeholder="{{ __('Selecione Presentacion') }}"
        placeholder="{{ __('Presentaciones') }}">
        </multiselect>
        <div v-if="errors.has('presentacion_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.cliente.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


