@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        input[type=checkbox] {
            display: none;
        }

        .container img {
            margin: 100px;
            transition: transform 0.25s ease;
            cursor: zoom-in;
        }

        input[type=checkbox]:checked ~ label > img {
            transform: scale(2);
            cursor: zoom-out;
        }
    </style>
    <div class="main-content" style="    margin-top: 1%">

        <div class="page-content-wrapper">
            <div class="container-fluid" style="width: 80%;margin-left: 0px  !important;">
                <h4>Update Report</h4>

                <div class="col-sm-6 col-md-10 border border-primary">
                    <div style="height:550px;overflow-x:scroll">


                        @foreach($images as $image)

                            <div class="item">

                                <img class="d-block w-100" src="{{ asset($image->url) }}"
                                     alt="First slide">

                            </div>

                        @endforeach

                    </div>
                </div>

                <div class="col-sm-6 col-md-2 border border-primary" style="margin-top: 4%">
                    <form class="needs-validation"
{{--                          action="{{ route('report.update',$reports->id) }}"--}}
                          novalidate
                          method="POST" id="form">
                        @csrf
                        @method('PUT')
                        <div class="alert alert-success d-none" id="msg_div">
                            <span id="res_message"></span>
                        </div>
                        <div style=" width: 406px; padding-top: 34%">
                            <div class="row">
                                <div class="col-md-12 mb-3 ml-3" style="margin-bottom: 6%" >
                                    <label for="validationCustom01">Report Name</label>
                                    <input type="text" name="report_id" value="{{ $reports->title?? '' }}"  class="form-control"
                                           id="report_id" required>
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                            @error('title')
                            <p style="color: red"> {{ $message }}</p>
                            @enderror

                            <div class="row">
                                <div class="col-md-4 mb-3 ml-3">
                                    <label for="validationCustom01">Para No</label>
                                    <input type="text" name="para_no" class="form-control"
                                           id="para_no" placeholder="" required>
                                </div>
                            </div>
                            @error('company_name')
                            <p style="color: red"> {{ $message }}</p>
                            @enderror
                            <div class="row">
                                <div class="col-md-12 mb-3 ml-3"style="margin-bottom: 6%; margin-top: 2%">
                                    <label for="validationCustom01">Remarks</label>
                                    <div class="form-outline">
                                        <textarea class="form-control" name="comments" id="comments" rows="4" ></textarea>
                                    </div>

                                </div>
                            </div>
                            @error('remarks')
                            <p style="color: red"> {{ $message }}</p>
                            @enderror
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 mb-3 ml-3"style="margin-bottom: 6%">--}}
{{--                                    <label for="validationCustom01">Updated By</label>--}}
{{--                                    <input type="text" name="updated_user_id" value="{{ auth()->user()->name ?? '' }}"  class="form-control"--}}
{{--                                           id="validationCustom01" required>--}}
{{--                                    <span class="text-muted"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @error('updated_user_id')--}}
{{--                            <p style="color: red"> {{ $message }}</p>--}}
{{--                            @enderror--}}
                            <button class="btn btn-success btn-block waves-effect waves-light"
                                    style="background-color:#034f19;   height: 48px; width: 166px; "
                                    type="submit">Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

        $('#form').on('submit',function(event){
            event.preventDefault();
            // Get Alll Text Box Id's
            report_id = $('#report_id').val();
            para_no = $('#para_no').val();
            comments = $('#comments').val();

            $.ajax({
                url: "{{ route('report.update',$reports->id) }}", //Define Post URL
                type:"PUT",
                data:{
                    "_token": "{{ csrf_token() }}",
                    report_id:report_id,
                    para_no:para_no,
                    comments:comments,
                },
                //Display Response Success Message
                success: function(response){
                    $('#res_message').show();
                    $('#res_message').html(response.msg);
                    $('#msg_div').removeClass('d-none');

                    document.getElementById("form").reset();
                    setTimeout(function(){
                        $('#res_message').hide();
                        $('#msg_div').hide();
                    },4000);
                },
            });
            // document.getElementById('form').reset();
        });




    </script>

@endsection

