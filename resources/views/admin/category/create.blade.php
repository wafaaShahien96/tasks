@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
 اضافه التصنيفات
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التصنيفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                تصنيف</span>
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
                <b>{{ trans('global.create') }} Category</b>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                      <label for="name_en"> <b>name_en </b> </label>
                      <input type="text" name="name:en" id="name_en" class="form-control" placeholder="name en .." >
                        @error('name:en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                     <div class="form-group">
                      <label for="name_ar"><b>name_ar  </b></label>
                      <input type="text" name="name:ar" id="name_ar" class="form-control" placeholder="name ar .." >
                        @error('name:ar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                </div>

                    <div class="row " id="cats_list" style="display:none">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>choose_category</label>
                                <select name="parent_id" class="form-control">
                                @foreach ($categories as $category)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                                @error('parent_id')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror

                            </div>
                        </div>
                       </div>


                  <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mt-1">
                                <input type="radio"
                                       name="type"
                                       value="1"
                                       checked

                                       class="switchery"
                                       data-color="success" />


                                <label class="card-title ml-1">main category</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group mt-1">
                                <input type="radio"


                                       name="type"
                                       value="2"
                                       class="switchery" data-color="success" />

                                <label class="card-title ml-1">sub category</label>
                            </div>
                        </div>

                    </div>



                    <div class="float-right">
                        <button class="btn btn-primary">@lang('trans.submit')</button>
                        <a type="button" class="btn btn-success ml-3 " href="{{ route('categories.index') }}">@lang('trans.back')</a>
                    </div>
                </form>
            </div>
    </div>
        </div>

    </div>
    @endsection
    @section('js')

<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
{{-- @push('js') --}}
    <script>
        $('input:radio[name="type"]').on('change', function() {
            // console.log($(this).val());
                if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                    $('#cats_list').css('display','block');
                }else{
                    $('#cats_list').css('display','none');
                }
            });
    </script>
{{-- @endpush --}}
@endsection

