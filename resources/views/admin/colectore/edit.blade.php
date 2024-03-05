@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.colectore.actions.edit', ['name' => $colectore->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <colectore-form
                :action="'{{ $colectore->resource_url }}'"
                :data="{{ $colectore->toJson() }}"
                :clientes="{{$clientes->toJson()}}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.colectore.actions.edit', ['name' => $colectore->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.colectore.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </colectore-form>

        </div>
    
</div>

@endsection