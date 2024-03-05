@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.viruta.actions.edit', ['name' => $virutum->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <viruta-form
                :action="'{{ $virutum->resource_url }}'"
                :data="{{ $virutum->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.viruta.actions.edit', ['name' => $virutum->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.viruta.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </viruta-form>

        </div>
    
</div>

@endsection