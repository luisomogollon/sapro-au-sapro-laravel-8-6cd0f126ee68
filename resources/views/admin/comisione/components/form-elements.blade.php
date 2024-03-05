<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comision_cvm'), 'has-success': fields.comision_cvm && fields.comision_cvm.valid }">
    <label for="comision_cvm" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.comisione.columns.comision_cvm') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comision_cvm" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comision_cvm'), 'form-control-success': fields.comision_cvm && fields.comision_cvm.valid}" id="comision_cvm" name="comision_cvm" placeholder="{{ trans('admin.comisione.columns.comision_cvm') }}">
        <div v-if="errors.has('comision_cvm')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_cvm') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comision_descripcion'), 'has-success': fields.comision_descripcion && fields.comision_descripcion.valid }">
    <label for="comision_descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.comisione.columns.comision_descripcion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comision_descripcion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comision_descripcion'), 'form-control-success': fields.comision_descripcion && fields.comision_descripcion.valid}" id="comision_descripcion" name="comision_descripcion" placeholder="{{ trans('admin.comisione.columns.comision_descripcion') }}">
        <div v-if="errors.has('comision_descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comision_monto'), 'has-success': fields.comision_monto && fields.comision_monto.valid }">
    <label for="comision_monto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.comisione.columns.comision_monto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comision_monto" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comision_monto'), 'form-control-success': fields.comision_monto && fields.comision_monto.valid}" id="comision_monto" name="comision_monto" placeholder="{{ trans('admin.comisione.columns.comision_monto') }}">
        <div v-if="errors.has('comision_monto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_monto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comision_planta'), 'has-success': fields.comision_planta && fields.comision_planta.valid }">
    <label for="comision_planta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.comisione.columns.comision_planta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.comision_planta" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('comision_planta'), 'form-control-success': fields.comision_planta && fields.comision_planta.valid}" id="comision_planta" name="comision_planta" placeholder="{{ trans('admin.comisione.columns.comision_planta') }}">
        <div v-if="errors.has('comision_planta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comision_planta') }}</div>
    </div>
</div>




