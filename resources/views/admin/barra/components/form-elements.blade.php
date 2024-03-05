<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_codigo'), 'has-success': fields.barra_codigo && fields.barra_codigo.valid }">
    <label for="barra_codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_codigo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_codigo'), 'form-control-success': fields.barra_codigo && fields.barra_codigo.valid}" id="barra_codigo" name="barra_codigo" placeholder="{{ trans('admin.barra.columns.barra_codigo') }}">
        <div v-if="errors.has('barra_codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_codigo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_descripcion_operacion'), 'has-success': fields.barra_descripcion_operacion && fields.barra_descripcion_operacion.valid }">
    <label for="barra_descripcion_operacion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_descripcion_operacion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.barra_descripcion_operacion" v-validate="''" id="barra_descripcion_operacion" name="barra_descripcion_operacion"></textarea>
        </div>
        <div v-if="errors.has('barra_descripcion_operacion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_descripcion_operacion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_estado_id'), 'has-success': fields.barra_estado_id && fields.barra_estado_id.valid }">
    <label for="barra_estado_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_estado_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_estado_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_estado_id'), 'form-control-success': fields.barra_estado_id && fields.barra_estado_id.valid}" id="barra_estado_id" name="barra_estado_id" placeholder="{{ trans('admin.barra.columns.barra_estado_id') }}">
        <div v-if="errors.has('barra_estado_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_estado_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_ley_final'), 'has-success': fields.barra_ley_final && fields.barra_ley_final.valid }">
    <label for="barra_ley_final" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_ley_final') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_ley_final" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_ley_final'), 'form-control-success': fields.barra_ley_final && fields.barra_ley_final.valid}" id="barra_ley_final" name="barra_ley_final" placeholder="{{ trans('admin.barra.columns.barra_ley_final') }}">
        <div v-if="errors.has('barra_ley_final')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_ley_final') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_ley_ingreso'), 'has-success': fields.barra_ley_ingreso && fields.barra_ley_ingreso.valid }">
    <label for="barra_ley_ingreso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_ley_ingreso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_ley_ingreso" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_ley_ingreso'), 'form-control-success': fields.barra_ley_ingreso && fields.barra_ley_ingreso.valid}" id="barra_ley_ingreso" name="barra_ley_ingreso" placeholder="{{ trans('admin.barra.columns.barra_ley_ingreso') }}">
        <div v-if="errors.has('barra_ley_ingreso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_ley_ingreso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_muestra'), 'has-success': fields.barra_muestra && fields.barra_muestra.valid }">
    <label for="barra_muestra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_muestra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_muestra" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_muestra'), 'form-control-success': fields.barra_muestra && fields.barra_muestra.valid}" id="barra_muestra" name="barra_muestra" placeholder="{{ trans('admin.barra.columns.barra_muestra') }}">
        <div v-if="errors.has('barra_muestra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_muestra') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_peso_banco'), 'has-success': fields.barra_peso_banco && fields.barra_peso_banco.valid }">
    <label for="barra_peso_banco" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_peso_banco') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_peso_banco" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_peso_banco'), 'form-control-success': fields.barra_peso_banco && fields.barra_peso_banco.valid}" id="barra_peso_banco" name="barra_peso_banco" placeholder="{{ trans('admin.barra.columns.barra_peso_banco') }}">
        <div v-if="errors.has('barra_peso_banco')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_peso_banco') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_peso_granalla'), 'has-success': fields.barra_peso_granalla && fields.barra_peso_granalla.valid }">
    <label for="barra_peso_granalla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_peso_granalla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_peso_granalla" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_peso_granalla'), 'form-control-success': fields.barra_peso_granalla && fields.barra_peso_granalla.valid}" id="barra_peso_granalla" name="barra_peso_granalla" placeholder="{{ trans('admin.barra.columns.barra_peso_granalla') }}">
        <div v-if="errors.has('barra_peso_granalla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_peso_granalla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_peso_ingreso'), 'has-success': fields.barra_peso_ingreso && fields.barra_peso_ingreso.valid }">
    <label for="barra_peso_ingreso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_peso_ingreso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_peso_ingreso" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_peso_ingreso'), 'form-control-success': fields.barra_peso_ingreso && fields.barra_peso_ingreso.valid}" id="barra_peso_ingreso" name="barra_peso_ingreso" placeholder="{{ trans('admin.barra.columns.barra_peso_ingreso') }}">
        <div v-if="errors.has('barra_peso_ingreso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_peso_ingreso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_ultimo_peso'), 'has-success': fields.barra_ultimo_peso && fields.barra_ultimo_peso.valid }">
    <label for="barra_ultimo_peso" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_ultimo_peso') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_ultimo_peso" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_ultimo_peso'), 'form-control-success': fields.barra_ultimo_peso && fields.barra_ultimo_peso.valid}" id="barra_ultimo_peso" name="barra_ultimo_peso" placeholder="{{ trans('admin.barra.columns.barra_ultimo_peso') }}">
        <div v-if="errors.has('barra_ultimo_peso')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_ultimo_peso') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('barra_und_masa'), 'has-success': fields.barra_und_masa && fields.barra_und_masa.valid }">
    <label for="barra_und_masa" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.barra_und_masa') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.barra_und_masa" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('barra_und_masa'), 'form-control-success': fields.barra_und_masa && fields.barra_und_masa.valid}" id="barra_und_masa" name="barra_und_masa" placeholder="{{ trans('admin.barra.columns.barra_und_masa') }}">
        <div v-if="errors.has('barra_und_masa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('barra_und_masa') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden_id'), 'has-success': fields.orden_id && fields.orden_id.valid }">
    <label for="orden_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.orden_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden_id'), 'form-control-success': fields.orden_id && fields.orden_id.valid}" id="orden_id" name="orden_id" placeholder="{{ trans('admin.barra.columns.orden_id') }}">
        <div v-if="errors.has('orden_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.barra.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.barra.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


