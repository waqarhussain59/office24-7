@extends('layouts.master')

@section('content')
    <div class="main-content">

        <div class="page-content">

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="row ml-2">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-end" style="margin-left: 94%; padding-top: 1%">
                                            <a class="btn btn-danger" href="{{route('report.create')}}" role="button">Add Report</a>
                                        </div>


                                        {!! $dataTable->filters() !!}
                                        <div class="table-responsive table-card">

                                            {!! $dataTable->table(['class' => 'table table-borderless table-centered align-middle table-nowrap mb-0 table-striped'], true) !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


{{--            <script>--}}

{{--                $(window).on('load', function(){--}}
{{--                    // When the page has loaded--}}
{{--                    $("body").fadeIn(0);--}}
{{--                    $('#cities_filter').hide();--}}
{{--                });--}}

{{--            </script>--}}
{{--            @endsection--}}
{{--            @section('script')--}}
                <script src="{!! asset('assets/js/mws_datatable.js') !!}"></script>
                <script src="{!! asset('js/Filter.js') !!}"></script>
            <script>

                $(window).on('load', function(){
                    $("#reports_filter").fadeIn(0.00).hide();
                });

            </script>
    {!! $dataTable->scripts() !!}
@endsection
