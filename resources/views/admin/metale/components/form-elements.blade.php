<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.metale.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('metal_codigo'), 'has-success': fields.metal_codigo && fields.metal_codigo.valid }">
    <label for="metal_codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.metale.columns.metal_codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.metal_codigo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('metal_codigo'), 'form-control-success': fields.metal_codigo && fields.metal_codigo.valid}" id="metal_codigo" name="metal_codigo" placeholder="{{ trans('admin.metale.columns.metal_codigo') }}">
        <div v-if="errors.has('metal_codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('metal_codigo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('metal_descripcion'), 'has-success': fields.metal_descripcion && fields.metal_descripcion.valid }">
    <label for="metal_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.metale.columns.metal_descripcion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.metal_descripcion" v-validate="''" id="metal_descripcion" name="metal_descripcion"></textarea>
        </div>
        <div v-if="errors.has('metal_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('metal_descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('metal_nombre'), 'has-success': fields.metal_nombre && fields.metal_nombre.valid }">
    <label for="metal_nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.metale.columns.metal_nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.metal_nombre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('metal_nombre'), 'form-control-success': fields.metal_nombre && fields.metal_nombre.valid}" id="metal_nombre" name="metal_nombre" placeholder="{{ trans('admin.metale.columns.metal_nombre') }}">
        <div v-if="errors.has('metal_nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('metal_nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('metal_simbolo'), 'has-success': fields.metal_simbolo && fields.metal_simbolo.valid }">
    <label for="metal_simbolo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.metale.columns.metal_simbolo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.metal_simbolo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('metal_simbolo'), 'form-control-success': fields.metal_simbolo && fields.metal_simbolo.valid}" id="metal_simbolo" name="metal_simbolo" placeholder="{{ trans('admin.metale.columns.metal_simbolo') }}">
        <div v-if="errors.has('metal_simbolo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('metal_simbolo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.metale.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.metale.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


