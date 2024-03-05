@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.salida.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
                @if (count($colectores) >= 1)
                <salida-form
            :action="'{{ url('admin/salidas') }}'"
            :lingotes = "{{ $lingotes->toJson() }}"
            :colectores = "{{ $colectores->toJson() }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.salida.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.salida.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </salida-form>
            @else
            <h1>Debe Registrar Colectores al Cliente {{$cliente->cliente_nombre}} {{$cliente->cliente_rif}}</h1>
            @endif


        </div>

        </div>


@endsection
