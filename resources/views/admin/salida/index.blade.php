@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.salida.actions.index'))

@section('body')

    <salida-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/salidas') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="dropdown">
                            <a class="btn btn-primary btn-sm pull-right m-b-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus"></i>&nbsp; {{ trans('admin.salida.actions.create') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($clientes as $cliente)
                                <a class="dropdown-item" href="{{ route('admin/salidas/create',['cliente' => $cliente]) }}">{{$cliente->cliente_rif}}</a>
                                @endforeach
                            </div>
                          </div>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.salida.columns.id') }}</th>
                                        <th is='sortable' :column="'salida_referencia'">{{ trans('admin.salida.columns.salida_referencia') }}</th>
                                        <th is='sortable' :column="'activated'">{{ trans('admin.salida.columns.activated') }}</th>
                                        <th is='sortable' :column="'salida_descripcion'">{{ trans('admin.salida.columns.salida_descripcion') }}</th>
                                        <th is='sortable' :column="'colector_id'">{{ trans('admin.salida.columns.colector_id') }}</th>
                                        <th is='sortable' :column="'salida_estado_id'">{{ trans('admin.salida.columns.salida_estado_id') }}</th>
                                        <th is='sortable' :column="'created_by_admin_user_id'">{{ trans('admin.salida.columns.created_by_admin_user_id') }}</th>
                                        <th is='sortable' :column="'updated_by_admin_user_id'">{{ trans('admin.salida.columns.updated_by_admin_user_id') }}</th>
                                        <th is='sortable' :column="'user_id'">{{ trans('admin.salida.columns.user_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="11">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/salidas')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/salidas/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.salida_referencia }}</td>
                                        <td>
                                            <div v-if="item.salida_estado_id != 2">
                                            <label class="switch switch-3d switch-success">
                                                <input type="checkbox" class="switch-input" disabled v-model="collection[index].activated" @change="toggleSwitch(item.resource_url, 'activated', collection[index])">
                                                <span class="switch-slider"></span>
                                            </label>
                                            </div>
                                            <div v-else>
                                            <label class="switch switch-3d switch-success">
                                                <input type="checkbox" class="switch-input"  v-model="collection[index].activated" @change="toggleSwitch(item.resource_url, 'activated', collection[index])">
                                                <span class="switch-slider"></span>
                                            </label>
                                            </div>
                                        </td>

                                        <td>@{{ item.salida_descripcion }}</td>
                                        <td>@{{ item.colector_id }}</td>
                                        <td>@{{ item.salida_estado_id }}</td>
                                            <div class="user-detail-tooltips-list">
                                            <td>
                                                <user-detail-tooltip :user="item.created_by_admin_user" v-if="item.created_by_admin_user">
                                                    <p>Created on @{{ item.created_at | datetime('HH:mm:ss, DD.MM.YYYY') }}</p>
                                                </user-detail-tooltip>
                                            </td>
                                        </div>

                                            <div class="user-detail-tooltips-list">
                                            <td>
                                                <user-detail-tooltip :user="item.updated_by_admin_user" v-if="item.updated_by_admin_user">
                                                    <p>Updated on @{{ item.updated_at | datetime('HH:mm:ss, DD.MM.YYYY') }}</p>
                                                </user-detail-tooltip>
                                            </td>
                                        </div>

                                        <td>@{{ item.user_id }}</td>

                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/salidas/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.salida.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </salida-listing>

@endsection
