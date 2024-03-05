@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.salida-estado.actions.edit', ['name' => $salidaEstado->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <salida-estado-form
                :action="'{{ $salidaEstado->resource_url }}'"
                :data="{{ $salidaEstado->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.salida-estado.actions.edit', ['name' => $salidaEstado->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.salida-estado.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </salida-estado-form>

        </div>
    
</div>

@endsection