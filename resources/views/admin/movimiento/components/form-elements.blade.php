{{--<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.movimiento.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>--}}

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco_id'), 'has-success': fields.banco_id && fields.banco_id.valid }">
    <label for="banco_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.movimiento.columns.banco_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco_id'), 'form-control-success': fields.banco_id && fields.banco_id.valid}" id="banco_id" name="banco_id" placeholder="{{ trans('admin.movimiento.columns.banco_id') }}">
        <div v-if="errors.has('banco_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_id'), 'has-success': fields.barra_id && fields.barra_id.valid }">
    <label for="barra_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.movimiento.columns.barra_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_id'), 'form-control-success': fields.barra_id && fields.barra_id.valid}" id="barra_id" name="barra_id" placeholder="{{ trans('admin.movimiento.columns.barra_id') }}">
        <div v-if="errors.has('barra_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('movimiento_cifra'), 'has-success': fields.movimiento_cifra && fields.movimiento_cifra.valid }">
    <label for="movimiento_cifra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.movimiento.columns.movimiento_cifra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.movimiento_cifra" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('movimiento_cifra'), 'form-control-success': fields.movimiento_cifra && fields.movimiento_cifra.valid}" id="movimiento_cifra" name="movimiento_cifra" placeholder="{{ trans('admin.movimiento.columns.movimiento_cifra') }}">
        <div v-if="errors.has('movimiento_cifra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('movimiento_cifra') }}</div>
    </div>
</div>

{{--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('movimiento_codigo'), 'has-success': fields.movimiento_codigo && fields.movimiento_codigo.valid }">
    <label for="movimiento_codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.movimiento.columns.movimiento_codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.movimiento_codigo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('movimiento_codigo'), 'form-control-success': fields.movimiento_codigo && fields.movimiento_codigo.valid}" id="movimiento_codigo" name="movimiento_codigo" placeholder="{{ trans('admin.movimiento.columns.movimiento_codigo') }}">
        <div v-if="errors.has('movimiento_codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('movimiento_codigo') }}</div>
    </div>
</div>--}}

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('movimiento_tipo'), 'has-success': fields.movimiento_tipo && fields.movimiento_tipo.valid }">
    <label for="movimiento_tipo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.movimiento.columns.movimiento_tipo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select type="text" v-model="form.movimiento_tipo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('movimiento_tipo'), 'form-control-success': fields.movimiento_tipo && fields.movimiento_tipo.valid}" id="movimiento_tipo" name="movimiento_tipo" placeholder="{{ trans('admin.movimiento.columns.movimiento_tipo') }}">
            <option value="DEPOSITO">DEPOSITO</option>
            <option value="RETIRO">RETIRO</option>
        </select>
        <div v-if="errors.has('movimiento_tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('movimiento_tipo') }}</div>
    </div>
</div>

{{--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.movimiento.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.movimiento.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>--}}


