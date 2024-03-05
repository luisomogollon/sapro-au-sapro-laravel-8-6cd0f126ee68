@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.presentacione.actions.edit', ['name' => $presentacione->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <presentacione-form
                :action="'{{ $presentacione->resource_url }}'"
                :data="{{ $presentacione->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.presentacione.actions.edit', ['name' => $presentacione->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.presentacione.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </presentacione-form>

        </div>
    
</div>

@endsection