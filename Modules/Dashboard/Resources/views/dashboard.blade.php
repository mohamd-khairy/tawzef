@extends('MA.layouts.main')

@section('title',__('left_aside.dashboard'))
@section('content')
<div class="col-12 mt-5">

    <!--begin:: Widgets/Activity-->
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">


        </div>
        <div class="kt-portlet__body kt-portlet__body--fit" >
            <div class="kt-widget17">
                <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #177C8E">
                    <div class="kt-widget17__chart" style="">
                    </div>
                </div>
                <div class="kt-widget17__stats">

                    <div class="kt-widget17__items">


                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--end:: Widgets/Activity-->
</div>
@endsection
