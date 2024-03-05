@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.ordene.actions.edit', ['name' => $ordene->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <ordene-form
                :action="'{{ $ordene->resource_url }}'"
                :data="{{ $ordene->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.ordene.actions.edit', ['name' => $ordene->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.ordene.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </ordene-form>

        </div>
    
</div>

@endsection