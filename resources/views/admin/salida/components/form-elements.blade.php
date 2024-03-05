{{--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('salida_referencia'), 'has-success': fields.salida_referencia && fields.salida_referencia.valid }">
    <label for="salida_referencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida.columns.salida_referencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.salida_referencia" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('salida_referencia'), 'form-control-success': fields.salida_referencia && fields.salida_referencia.valid}" id="salida_referencia" name="salida_referencia" placeholder="{{ trans('admin.salida.columns.salida_referencia') }}">
        <div v-if="errors.has('salida_referencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('salida_referencia') }}</div>
    </div>
</div>--}}

{{--<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.salida.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>--}}

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('salida_descripcion'), 'has-success': fields.salida_descripcion && fields.salida_descripcion.valid }">
    <label for="salida_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida.columns.salida_descripcion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.salida_descripcion" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('salida_descripcion'), 'form-control-success': fields.salida_descripcion && fields.salida_descripcion.valid}" id="salida_descripcion" name="salida_descripcion" placeholder="{{ trans('admin.salida.columns.salida_descripcion') }}">
        <div v-if="errors.has('salida_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('salida_descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('colector_id'), 'has-success': fields.colector_id && fields.colector_id.valid }">
    <label for="colectores" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida.columns.colector_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
        v-model="form.colectores"
        :options="colectores"
        :multiple="false"
        track-by="id"
        :searchable="true"
        label="colector_cedula"
        tag-placeholder="{{ __('Selecione Colector') }}"
        placeholder="{{ __('Colectores') }}">
        </multiselect>
        <div v-if="errors.has('colector_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('colector_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('salida_estado_id'), 'has-success': fields.salida_estado_id && fields.salida_estado_id.valid }">
    <label for="salida_estado_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida.columns.salida_estado_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.salida_estado_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('salida_estado_id'), 'form-control-success': fields.salida_estado_id && fields.salida_estado_id.valid}" id="salida_estado_id" name="salida_estado_id" placeholder="{{ trans('admin.salida.columns.salida_estado_id') }}">
        <div v-if="errors.has('salida_estado_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('salida_estado_id') }}</div>
    </div>
</div>



{{--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.salida.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.salida.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>--}}

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('lingotes'), 'has-success': this.fields.lingotes && this.fields.lingotes.valid }">
    <label for="lingotes"
    class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'" >{{ trans('admin.lingote.columns.lingote_troquelado_codigo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
        v-model="form.lingotes"
        :options="lingotes"
        :multiple="true"
        track-by="id"
        label="lingote_codigo"
        tag-placeholder="{{ __('Selecione Lingotes a salir') }}"
        placeholder="{{ __('Lingotes') }}">
        </multiselect>

    <div v-if="errors.has('lingotes')" class="form-control-feedback form-text" v-cloak>@{{
        errors.first('lingotes') }}
    </div>

</div>
