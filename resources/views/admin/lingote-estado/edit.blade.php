@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.lingote-estado.actions.edit', ['name' => $lingoteEstado->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <lingote-estado-form
                :action="'{{ $lingoteEstado->resource_url }}'"
                :data="{{ $lingoteEstado->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.lingote-estado.actions.edit', ['name' => $lingoteEstado->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.lingote-estado.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </lingote-estado-form>

        </div>
    
</div>

@endsection