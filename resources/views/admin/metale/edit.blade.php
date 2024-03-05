@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.metale.actions.edit', ['name' => $metale->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <metale-form
                :action="'{{ $metale->resource_url }}'"
                :data="{{ $metale->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.metale.actions.edit', ['name' => $metale->id]) }}
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