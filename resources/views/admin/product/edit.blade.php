@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
تعديل تفاصيل المنتج
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
            منتج</span>
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
                <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                      <label for="name"> <b>@lang('trans.product.fields.name') </b> </label>
                      <input type="text" name="name" id="name"  class="form-control" value="{{old('name',$product->name)}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                        <div class="col-md-6">
                    <div class="form-group">
                      <label for="desc"> <b>@lang('trans.product.fields.desc') </b> </label>
                      <input type="text" name="desc" id="desc" class="form-control" value="{{old('desc',$product->desc)}}">
                        @error('desc')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">


                        <div class="form-group">
                            <label for="image">@lang('trans.product.fields.image')</label>
                            <input type="file" name="image" id="image" class="form-control" >
                              @error('image')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                         </div>
                   </div>
                    </div>
            

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select a Category</option>

                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                       {{ $product->category_id == $category->id ? "selected" : "" }} >{{ $category->name }}
                                    </option>
                                    @if ($category->children)
                                    @foreach ($category->children as $child)
                                    <option value="{{ $child->id }}"
                                        {{ $product->category_id == $child->id ? "selected" : "" }} >&nbsp;&nbsp;-
                                        &nbsp;{{ $child->name }}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                    </div>



                        <div class="col-md-6">
                            {{-- purchasing_price --}}
                            <div class="form-group">
                                <label for="inputName">@lang('trans.product.fields.purchasing_price')</label>
                                <input type="number" id="purchasing_price" name="purchasing_price"  class="form-control" value="{{old('purchasing_price',$product->purchasing_price)}}"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                  @error('purchasing_price')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- date --}}
                            <div class="form-group">
                                <label for="inputName">@lang('trans.product.fields.selling_price')</label>
                                <input type="number" id="selling_price" name="selling_price"  class="form-control" value="{{old('selling_price',$product->selling_price)}}"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                  @error('selling_price')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                      </div>
                        </div>

                         <div class="col-md-6">
                            {{-- location --}}
                            <div class="form-group">
                                <label for="inputName">@lang('trans.product.fields.amount')</label>
                                <input type="number" id="amount" name="amount"  value="{{old('amount',$product->amount)}}" class="form-control">
                                  @error('amount')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col">
                                <label for="inputName" class="control-label">نسبة ضريبة القيمة المضافة</label>
                                <select name="Rate_VAT" id="Rate_VAT" class="form-control" onchange="myFunction()">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد نسبة الضريبة</option>
                                    <option value=" 0%">0%</option>
                                </select>
                            </div>
                        </div>

                         <div class="col-md-6">
                            {{-- location --}}
                            <div class="form-group">
                                <div class="col">
                                    <label for="inputName" class="control-label">الاجمالي شامل الضريبة</label>
                                    <input type="text" class="form-control" id="Total" name="Total" value="{{old('Total',$product->Total)}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="food">Tags</label>

                                <div class="form-group">
                                    <select id="food" multiple name="tag_id[]" style="
                                           width: 284px;
                                           " class="multiselect multiselect-custom">
                                        @foreach ($tages as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name_ar }} </option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tag_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tag_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                           </div>
                            </div>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-primary">submit</button>
                        <a type="button" class="btn btn-success ml-3 " href="{{ route('products.index') }}">back</a>
                    </div>
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

    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
    <script>
        function myFunction() {
            var purchasing_price = parseFloat(document.getElementById("purchasing_price").value);
            var selling_price = parseFloat(document.getElementById("selling_price").value);
            var amount = parseFloat(document.getElementById("amount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            // var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
            var purchasing_price2 = (selling_price * amount);
            if (typeof purchasing_price === 'undefined' || !purchasing_price) {
                alert('يرجي ادخال مبلغ العمولة ');
            } else {
                var intResults = selling_price * amount ;
                var intResults2 = parseFloat(intResults);
                sumq = parseFloat(intResults).toFixed(2);
                sumt = parseFloat(intResults2).toFixed(2);
                // document.getElementById("Value_VAT").value = sumq;
                document.getElementById("Total").value = sumt;
            }
        }
    </script>
@endsection

