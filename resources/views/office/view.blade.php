@extends('layouts.master')

@section('content')

    <div class="main-content">
        <div class="page-content">

            <div class="center-block">


                <div class="page-content-wrapper ">
                    <div class="container-fluid">

                        <div class=" d-flex p-2 center-block">
                            <div class=" d-inline-flex " style="padding-bottom: 7%">
                                <div class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5  ">
                                    <h5 class="fw-bold text-center">IN THE HONORABLE ISLAMABAD HIGH COURT,</h5>
                                    <h5 class="fw-bold text-center">ISLAMABAD</h5>
                                    <div
                                        class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                                        <div class="truncate  white-space-sm-wrap d-flex align-items-center  ">
                                            <b>Court Case Name:</b>&nbsp; {{ $reports->title ?? '' }} </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="page-content-wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="header-title">Comments </h4>
                                                <p class="card-title-desc">
                                                </p>

                                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="3">Para no</th>
                                                        <th rowspan="3">Remarks</th>
                                                        <th rowspan="2">Time</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($comments as $data)
                                                        <tr>
                                                            <td>{{$data->para_no ?? ''}}</td>
                                                            <td>
                                                                {{ $data->comments?? '' }}
                                                            </td>
                                                            <td>{{ $data->created_at?? '' }}</td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                            </div>
                            <!-- end container-fluid -->
                        </div>


                    </div>
                </div>


            </div>

@endsection

