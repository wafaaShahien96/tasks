@extends('layouts.master')
@section('css')

@section('title')
اضافه تصنيف -شركه شحن
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التصنيفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                اضافه تصنيف </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{-- @can('اضافه_شحن') --}}
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    {{-- @can('اضافة شحن') --}}
                    <a class="btn btn-primary btn-sm" href="{{ route('categories.create') }}">اضافة تصنيف</a>
                    {{-- @endcan --}}
                </div>
            </div>
            {{-- @endcan --}}

            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('trans.categories.fields.name')</th>
                            <th>@lang('trans.categories.fields.main_category')</th>
                            <th>@lang('trans.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->_parent->name ?? ''}}</td>
                               <td>

                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#exampleModal-{{ $category->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                        <div class="body">


                                            <div style="margin-top:-5px" class="modal fade"
                                                id="exampleModal-{{ $category->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel--{{ $category->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel--{{ $category->id }}">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do You Want Delete This ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                                method='POST'>
                                                                @csrf
                                                                {{ method_field('Delete') }}

                                                                <input type='submit' name='send' value='Yes'
                                                                    class="btn btn-primary theme-bg gradient">

                                                            </form>
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                            </table>
                            <div class="justify-content-center d-flex"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

@endsection

