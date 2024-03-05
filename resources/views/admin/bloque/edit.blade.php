@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.bloque.actions.edit', ['name' => $bloque->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <bloque-form
                :action="'{{ $bloque->resource_url }}'"
                :data="{{ $bloque->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.bloque.actions.edit', ['name' => $bloque->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.bloque.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </bloque-form>

        </div>
    
</div>

@endsection