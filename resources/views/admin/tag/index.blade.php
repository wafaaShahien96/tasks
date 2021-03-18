@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    tag
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">tags</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                add tag</span>
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
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                        <a class="btn btn-primary btn-sm" href="{{ route('tags.create') }}">Add New Tag</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th width="10">
                                    #
                                </th>
                                <th>Name en</th>
                                <th>Name ar</th>

                                <th>Options</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tages as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name_en }}</td>
                                    <td>{{ $tag->name_ar }}</td>



                                    <td>

                                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-info"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#exampleModal-{{ $tag->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                        <div class="body">


                                            <div style="margin-top:-5px" class="modal fade"
                                                id="exampleModal-{{ $tag->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel--{{ $tag->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel--{{ $tag->id }}">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do You Want Delete This ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('tags.destroy', $tag->id) }}"
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
                </div>
            </div>
        </div>
    </div>

</div>
</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
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
