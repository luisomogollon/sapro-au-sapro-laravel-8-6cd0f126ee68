<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ley_margen'), 'has-success': fields.ley_margen && fields.ley_margen.valid }">
    <label for="ley_margen" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.leye.columns.ley_margen') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ley_margen" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ley_margen'), 'form-control-success': fields.ley_margen && fields.ley_margen.valid}" id="ley_margen" name="ley_margen" placeholder="{{ trans('admin.leye.columns.ley_margen') }}">
        <div v-if="errors.has('ley_margen')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ley_margen') }}</div>
    </div>
</div>



