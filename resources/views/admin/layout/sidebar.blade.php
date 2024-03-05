<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/colectores') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.colectore.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/salida-estados') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.salida-estado.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/presentaciones') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.presentacione.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/lingote-estados') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.lingote-estado.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/lingotes') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.lingote.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/salidas') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.salida.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/bancos') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.banco.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ordenes') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.ordene.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/movimientos') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.movimiento.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/barras') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.barra.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.cliente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/comisiones') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.comisione.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/leyes') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.leye.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/virutas') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.viruta.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/metales') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.metale.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/bloques') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.bloque.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
