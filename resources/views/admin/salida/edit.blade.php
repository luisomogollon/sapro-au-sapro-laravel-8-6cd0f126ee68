@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.salida.actions.edit', ['name' => $salida->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <salida-form
                :action="'{{ $salida->resource_url }}'"
                :data="{{ $salida->toJson() }}"
                :lingotes= "{{ $lingotes->toJson()}}"
                :colectores= "{{ $colectores->toJson()}}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.salida.actions.edit', ['name' => $salida->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.salida.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </salida-form>

        </div>
    
</div>

@endsection