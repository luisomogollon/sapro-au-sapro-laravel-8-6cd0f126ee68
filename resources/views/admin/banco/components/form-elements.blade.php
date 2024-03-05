<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco_mineral'), 'has-success': fields.banco_mineral && fields.banco_mineral.valid }">
    <label for="banco_mineral" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.banco.columns.banco_mineral') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco_mineral" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco_mineral'), 'form-control-success': fields.banco_mineral && fields.banco_mineral.valid}" id="banco_mineral" name="banco_mineral" placeholder="{{ trans('admin.banco.columns.banco_mineral') }}">
        <div v-if="errors.has('banco_mineral')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco_mineral') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco_cuenta'), 'has-success': fields.banco_cuenta && fields.banco_cuenta.valid }">
    <label for="banco_cuenta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.banco.columns.banco_cuenta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco_cuenta" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco_cuenta'), 'form-control-success': fields.banco_cuenta && fields.banco_cuenta.valid}" id="banco_cuenta" name="banco_cuenta" placeholder="{{ trans('admin.banco.columns.banco_cuenta') }}">
        <div v-if="errors.has('banco_cuenta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco_cuenta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco_cantidad_disponible'), 'has-success': fields.banco_cantidad_disponible && fields.banco_cantidad_disponible.valid }">
    <label for="banco_cantidad_disponible" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.banco.columns.banco_cantidad_disponible') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco_cantidad_disponible" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco_cantidad_disponible'), 'form-control-success': fields.banco_cantidad_disponible && fields.banco_cantidad_disponible.valid}" id="banco_cantidad_disponible" name="banco_cantidad_disponible" placeholder="{{ trans('admin.banco.columns.banco_cantidad_disponible') }}">
        <div v-if="errors.has('banco_cantidad_disponible')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco_cantidad_disponible') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco_cantidad_retiros'), 'has-success': fields.banco_cantidad_retiros && fields.banco_cantidad_retiros.valid }">
    <label for="banco_cantidad_retiros" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.banco.columns.banco_cantidad_retiros') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco_cantidad_retiros" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco_cantidad_retiros'), 'form-control-success': fields.banco_cantidad_retiros && fields.banco_cantidad_retiros.valid}" id="banco_cantidad_retiros" name="banco_cantidad_retiros" placeholder="{{ trans('admin.banco.columns.banco_cantidad_retiros') }}">
        <div v-if="errors.has('banco_cantidad_retiros')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco_cantidad_retiros') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco_cantidad_depositos'), 'has-success': fields.banco_cantidad_depositos && fields.banco_cantidad_depositos.valid }">
    <label for="banco_cantidad_depositos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.banco.columns.banco_cantidad_depositos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco_cantidad_depositos" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco_cantidad_depositos'), 'form-control-success': fields.banco_cantidad_depositos && fields.banco_cantidad_depositos.valid}" id="banco_cantidad_depositos" name="banco_cantidad_depositos" placeholder="{{ trans('admin.banco.columns.banco_cantidad_depositos') }}">
        <div v-if="errors.has('banco_cantidad_depositos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco_cantidad_depositos') }}</div>
    </div>
</div>


