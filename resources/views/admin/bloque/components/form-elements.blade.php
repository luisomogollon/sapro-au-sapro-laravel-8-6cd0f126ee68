<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_estado_id'), 'has-success': fields.bloque_estado_id && fields.bloque_estado_id.valid }">
    <label for="bloque_estado_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_estado_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_estado_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_estado_id'), 'form-control-success': fields.bloque_estado_id && fields.bloque_estado_id.valid}" id="bloque_estado_id" name="bloque_estado_id" placeholder="{{ trans('admin.bloque.columns.bloque_estado_id') }}">
        <div v-if="errors.has('bloque_estado_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_estado_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_oro_cargado'), 'has-success': fields.bloque_oro_cargado && fields.bloque_oro_cargado.valid }">
    <label for="bloque_oro_cargado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_oro_cargado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_oro_cargado" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_oro_cargado'), 'form-control-success': fields.bloque_oro_cargado && fields.bloque_oro_cargado.valid}" id="bloque_oro_cargado" name="bloque_oro_cargado" placeholder="{{ trans('admin.bloque.columns.bloque_oro_cargado') }}">
        <div v-if="errors.has('bloque_oro_cargado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_oro_cargado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_oro_granalla'), 'has-success': fields.bloque_oro_granalla && fields.bloque_oro_granalla.valid }">
    <label for="bloque_oro_granalla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_oro_granalla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_oro_granalla" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_oro_granalla'), 'form-control-success': fields.bloque_oro_granalla && fields.bloque_oro_granalla.valid}" id="bloque_oro_granalla" name="bloque_oro_granalla" placeholder="{{ trans('admin.bloque.columns.bloque_oro_granalla') }}">
        <div v-if="errors.has('bloque_oro_granalla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_oro_granalla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_oro_ley'), 'has-success': fields.bloque_oro_ley && fields.bloque_oro_ley.valid }">
    <label for="bloque_oro_ley" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_oro_ley') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_oro_ley" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_oro_ley'), 'form-control-success': fields.bloque_oro_ley && fields.bloque_oro_ley.valid}" id="bloque_oro_ley" name="bloque_oro_ley" placeholder="{{ trans('admin.bloque.columns.bloque_oro_ley') }}">
        <div v-if="errors.has('bloque_oro_ley')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_oro_ley') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_oro_ley_real'), 'has-success': fields.bloque_oro_ley_real && fields.bloque_oro_ley_real.valid }">
    <label for="bloque_oro_ley_real" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_oro_ley_real') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_oro_ley_real" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_oro_ley_real'), 'form-control-success': fields.bloque_oro_ley_real && fields.bloque_oro_ley_real.valid}" id="bloque_oro_ley_real" name="bloque_oro_ley_real" placeholder="{{ trans('admin.bloque.columns.bloque_oro_ley_real') }}">
        <div v-if="errors.has('bloque_oro_ley_real')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_oro_ley_real') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_oro_resultado'), 'has-success': fields.bloque_oro_resultado && fields.bloque_oro_resultado.valid }">
    <label for="bloque_oro_resultado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_oro_resultado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_oro_resultado" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_oro_resultado'), 'form-control-success': fields.bloque_oro_resultado && fields.bloque_oro_resultado.valid}" id="bloque_oro_resultado" name="bloque_oro_resultado" placeholder="{{ trans('admin.bloque.columns.bloque_oro_resultado') }}">
        <div v-if="errors.has('bloque_oro_resultado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_oro_resultado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_otros_cargado'), 'has-success': fields.bloque_otros_cargado && fields.bloque_otros_cargado.valid }">
    <label for="bloque_otros_cargado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_otros_cargado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_otros_cargado" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_otros_cargado'), 'form-control-success': fields.bloque_otros_cargado && fields.bloque_otros_cargado.valid}" id="bloque_otros_cargado" name="bloque_otros_cargado" placeholder="{{ trans('admin.bloque.columns.bloque_otros_cargado') }}">
        <div v-if="errors.has('bloque_otros_cargado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_otros_cargado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_otros_resultado'), 'has-success': fields.bloque_otros_resultado && fields.bloque_otros_resultado.valid }">
    <label for="bloque_otros_resultado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_otros_resultado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_otros_resultado" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_otros_resultado'), 'form-control-success': fields.bloque_otros_resultado && fields.bloque_otros_resultado.valid}" id="bloque_otros_resultado" name="bloque_otros_resultado" placeholder="{{ trans('admin.bloque.columns.bloque_otros_resultado') }}">
        <div v-if="errors.has('bloque_otros_resultado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_otros_resultado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_peso'), 'has-success': fields.bloque_peso && fields.bloque_peso.valid }">
    <label for="bloque_peso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_peso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_peso" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_peso'), 'form-control-success': fields.bloque_peso && fields.bloque_peso.valid}" id="bloque_peso" name="bloque_peso" placeholder="{{ trans('admin.bloque.columns.bloque_peso') }}">
        <div v-if="errors.has('bloque_peso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_peso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_plata_cargado'), 'has-success': fields.bloque_plata_cargado && fields.bloque_plata_cargado.valid }">
    <label for="bloque_plata_cargado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_plata_cargado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_plata_cargado" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_plata_cargado'), 'form-control-success': fields.bloque_plata_cargado && fields.bloque_plata_cargado.valid}" id="bloque_plata_cargado" name="bloque_plata_cargado" placeholder="{{ trans('admin.bloque.columns.bloque_plata_cargado') }}">
        <div v-if="errors.has('bloque_plata_cargado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_plata_cargado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloque_plata_resultado'), 'has-success': fields.bloque_plata_resultado && fields.bloque_plata_resultado.valid }">
    <label for="bloque_plata_resultado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.bloque_plata_resultado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloque_plata_resultado" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloque_plata_resultado'), 'form-control-success': fields.bloque_plata_resultado && fields.bloque_plata_resultado.valid}" id="bloque_plata_resultado" name="bloque_plata_resultado" placeholder="{{ trans('admin.bloque.columns.bloque_plata_resultado') }}">
        <div v-if="errors.has('bloque_plata_resultado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloque_plata_resultado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.bloque.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.bloque.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


