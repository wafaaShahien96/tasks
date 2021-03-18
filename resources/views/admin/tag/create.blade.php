@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    Tags
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
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>خطا</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <i class="fa fa-pencil"></i>
                Create Tag
            </div>
            <div class="card-body">

                <form id="basic-form" method="post" novalidate action="{{ route('tags.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group c_form_group">
                        <label>Name (en):</label>
                        <input type="text" class="form-control" name="name_en" required value="{{ old('name_en') }}">
                        @if ($errors->has('name_en'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_en') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group c_form_group">
                        <label>Name (ar):</label>
                        <input type="text" class="form-control" name="name_ar" required value="{{ old('name_ar') }}">
                        @if ($errors->has('name_ar'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_ar') }}</strong>
                            </span>
                        @endif
                    </div>







                    <br>
                    <button type="submit" class="btn btn-primary theme-bg gradient">Save</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
