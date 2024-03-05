@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.lingote.actions.edit', ['name' => $lingote->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <lingote-form
                :action="'{{ $lingote->resource_url }}'"
                :data="{{ $lingote->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.lingote.actions.edit', ['name' => $lingote->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.lingote.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </lingote-form>

        </div>
    
</div>

@endsection