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
                                    <h5 class="fw-bold">Report Details</h5>
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

                                                        <th rowspan="2">Para No</th>
                                                        <th>Comments</th>
                                                        <th>Time</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @if (is_array($comments) || is_object($comments))
                                                        @foreach ($comments  as $comment)
                                                            <tr>
                                                                <td>{{ $comment->para_no ?? '' }}</td>
                                                                <td>{{ $comment->comments ?? '' }}</td>
                                                                <td>{{ ($comment->created_at)->format('d-m-Y h:i A') ?? '' }}</td>
{{--                                                                <td>--}}
                                                                    {{--                                                                <div class="btn-group" role="group">--}}
                                                                    {{--                                                                    <a href="{{ route('surveylist', $survey->id) }}"--}}
                                                                    {{--                                                                       type="button"--}}
                                                                    {{--                                                                       class="btn btn-outline-secondary btn-sm"--}}
                                                                    {{--                                                                       data-toggle="tooltip" data-placement="top"--}}
                                                                    {{--                                                                       title="view">--}}
                                                                    {{--                                                                        <i class="mdi mdi-eye"></i>--}}
                                                                    {{--                                                                    </a>--}}

                                                                    {{--                                                                </div>--}}
{{--                                                                </td>--}}

                                                            </tr>
                                                        @endforeach
                                                    @endif
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

