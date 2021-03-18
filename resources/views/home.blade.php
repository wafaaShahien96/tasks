@extends('layouts.master')
@section('title')
    لوحة التحكم - برنامج الفواتير
@stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-jvectormap.css')}}">

@endsection

    @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
              <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
              <p class="mg-b-0">Sales monitoring dashboard template.</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">Customer Ratings</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">Online Sales</label>
                <h5>563,275</h5>
            </div>
            <div>
                <label class="tx-13">Offline Sales</label>
                <h5>783,675</h5>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <!-- row closed -->
    {{-- <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header form-group-date">
                    <h2>World Map</h2>
                </div>
                <div class="body">
                    <div id="world-map-markers" class="jvector-map" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- /row -->
</div>
</div>
<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{URL::asset('assets/js/jquery-jvectormap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

<script src="{{URL::asset('assets/bundles/jvectormap.bundle.js')}}"></script><!-- JVectorMap Plugin Js -->
<script src="{{URL::asset('assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{URL::asset('assets/vendor/jvectormap/jquery-jvectormap-in-mill.js')}}"></script>       <!-- India Map Js -->
<script src="{{URL::asset('assets/vendor/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>     <!-- USA Map Js -->
<script src="{{URL::asset('assets/vendor/jvectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>    <!-- UK Map Js -->
<script src="{{URL::asset('assets/vendor/jvectormap/jquery-jvectormap-au-mill.js')}}"></script>       <!-- Australia Map Js -->


<!-- Project core js file minify with grunt -->
<script src="{{URL::asset('assets/bundles/mainscripts.bundle.js')}}"></script>




@endsection
