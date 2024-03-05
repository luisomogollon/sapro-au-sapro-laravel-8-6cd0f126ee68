<div class="form-group row align-items-center" :class="{'has-danger': errors.has('colector_nombres'), 'has-success': fields.colector_nombres && fields.colector_nombres.valid }">
    <label for="colector_nombres" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.colectore.columns.colector_nombres') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.colector_nombres" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('colector_nombres'), 'form-control-success': fields.colector_nombres && fields.colector_nombres.valid}" id="colector_nombres" name="colector_nombres" placeholder="{{ trans('admin.colectore.columns.colector_nombres') }}">
        <div v-if="errors.has('colector_nombres')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('colector_nombres') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('colector_apellidos'), 'has-success': fields.colector_apellidos && fields.colector_apellidos.valid }">
    <label for="colector_apellidos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.colectore.columns.colector_apellidos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.colector_apellidos" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('colector_apellidos'), 'form-control-success': fields.colector_apellidos && fields.colector_apellidos.valid}" id="colector_apellidos" name="colector_apellidos" placeholder="{{ trans('admin.colectore.columns.colector_apellidos') }}">
        <div v-if="errors.has('colector_apellidos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('colector_apellidos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('colector_cedula'), 'has-success': fields.colector_cedula && fields.colector_cedula.valid }">
    <label for="colector_cedula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.colectore.columns.colector_cedula') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.colector_cedula" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('colector_cedula'), 'form-control-success': fields.colector_cedula && fields.colector_cedula.valid}" id="colector_cedula" name="colector_cedula" placeholder="{{ trans('admin.colectore.columns.colector_cedula') }}">
        <div v-if="errors.has('colector_cedula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('colector_cedula') }}</div>
    </div>
</div>
<div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('cliente_id'), 'has-success': this.fields.cliente_id && this.fields.cliente_id.valid }">
        <label for="cliente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Colecto Cliente') }}</label>
        <div class="col-md-8 col-lg-9">
    
            <multiselect v-model="form.cliente" :options="clientes" :multiple="false" track-by="id" label="cliente_rif"
                tag-placeholder="{{ __('Seleccione Cliente') }}" placeholder="{{ __('Cliente') }}">
            </multiselect>
    
            <div v-if="errors.has('cliente_rif')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('cliente_rif') }}
            </div>
        </div>
    </div>


    @if ($mode === 'create')
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Colectore::class)->getMediaCollection('cedulas'),
                'label' => 'cedulas'
            ])
                <div v-if="errors.has('cedulas')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('cedulas') }}
                </div>
        @else
            @include('brackets/admin-ui::admin.includes.media-uploader', [
               'mediaCollection' => $colectore->getMediaCollection('cedulas'),
               'media' => $colectore->getThumbs200ForCollection('cedulas'),
               'label' => 'cedulas'
           ])
                <div v-if="errors.has('cedulas')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('cedulas') }}
                </div>
    @endif
</div>
