@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.metale.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <metale-form
            :action="'{{ url('admin/metales') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.metale.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.metale.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </metale-form>

        </div>

        </div>

    
@endsection