<div class="form-group row align-items-center" :class="{'has-danger': errors.has('viruta_muestra'), 'has-success': fields.viruta_muestra && fields.viruta_muestra.valid }">
    <label for="viruta_muestra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.viruta.columns.viruta_muestra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.viruta_muestra" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('viruta_muestra'), 'form-control-success': fields.viruta_muestra && fields.viruta_muestra.valid}" id="viruta_muestra" name="viruta_muestra" placeholder="{{ trans('admin.viruta.columns.viruta_muestra') }}">
        <div v-if="errors.has('viruta_muestra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('viruta_muestra') }}</div>
    </div>
</div>


