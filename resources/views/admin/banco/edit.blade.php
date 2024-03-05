@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.banco.actions.edit', ['name' => $banco->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <banco-form
                :action="'{{ $banco->resource_url }}'"
                :data="{{ $banco->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.banco.actions.edit', ['name' => $banco->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.banco.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </banco-form>

        </div>
    
</div>

@endsection