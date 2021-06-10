@extends('admin.layouts.app')
@section('title', 'Products')

@section('content')
    <div class="row wrapper border-bottom white-bg py-3">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Products</strong>
                </li>
            </ol>

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Products</h5>
                        <a class="btn btn-sm btn-primary pull-right"
                           href="{{ route('admin.products.create') }}"><i
                                class="fa fa-plus"></i> <strong>Create</strong></a>
                    </div>
                    <div class="ibox-content">
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.products.index')}}" method="get"
                                      role="form">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="perPage" class="control-label">Records Per Page</label>
                                                </div>
                                                <div class="col-md-4 pr-0 responsive_p_r_15">
                                                    <select name="perPage" id="perPage" onchange="submit()"
                                                            class="input-sm form-control custom_field_height">
                                                        <option
                                                            value="10"{{ request('perPage') == 10 ? ' selected' : '' }}>
                                                            10
                                                        </option>
                                                        <option
                                                            value="25"{{ request('perPage') == 25 ? ' selected' : '' }}>
                                                            25
                                                        </option>
                                                        <option
                                                            value="50"{{ request('perPage') == 50 ? ' selected' : '' }}>
                                                            50
                                                        </option>
                                                        <option
                                                            value="100"{{ request('perPage') == 100 ? ' selected' : '' }}>
                                                            100
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 pl-sm-1 pr-sm-1 responsive_p_t_f_5">
                                                    <div class="float-left input-group">
                                                        <input name="keyword" type="text"
                                                               value="{{ request('keyword') }}"
                                                               class="input-sm form-control" placeholder="Search Here">
                                                        <span class="input-group-btn">
                                                        <button type="submit"
                                                                class="btn btn-sm btn-primary custom_field_height"> Go!</button>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 p-0 responsive_p_l_15">
                                                <span>
                                                    <a href="{{ route('admin.products.index') }}"
                                                       class="btn btn-default btn-sm custom_field_height">Reset
                                                    </a>
                                                </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($products->count() > 0)
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>
                                                <img class="message-avatar"
                                                     src="{{ $product->images()->where('size', '75x75')->first()->url ?? getDefaultImage() }}"
                                                     alt="image">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->price }} {{ getCurrencyIcon() }}</td>
                                            <td>{{ $product->code }}</td>

                                            <td>
                                                <a onclick="changeStatus(this)" id="{{ $product->id }}"
                                                   data-route="{{ route('admin.products.status.change', '') }}"
                                                   href="javascript:void(0)"
                                                   title="Change publication status">
                                                    @if($product->status)
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Disable</span>
                                                    @endif
                                                </a>
                                            </td>

                                            <td>
                                                {{--                                                <a href="{{ route('admin.products.show', $product->id) }}"--}}
                                                {{--                                                   class="btn btn-info btn-sm cus_btn">--}}
                                                {{--                                                    <i class="fa fa-info-circle"></i>--}}
                                                {{--                                                </a>--}}

                                                <a href="{{ route('admin.products.edit', $product->id)  }}"
                                                   title="Edit"
                                                   class="btn btn-info btn-sm cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>

                                                <button onclick="deleteRow({{ $product->id }})"
                                                        href="JavaScript:void(0)"
                                                        title="Delete" class="btn btn-danger btn-sm cus_btn">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <form id="row-delete-form{{ $product->id }}" method="POST"
                                                      class="d-none"
                                                      action="{{ route('admin.products.destroy', $product->id) }}">
                                                    @method('DELETE')
                                                    @csrf()
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">No recode</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{ $products->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
