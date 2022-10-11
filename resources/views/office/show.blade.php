@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                <div class="row g-0 text-center">
                    <div class="col-sm-6 col-md-8 border border-primary">

                        <div class="carousel-inner" role="listbox">

                            @foreach($images as $image)

                                <div class="item">

                                    <img class="d-block w-100" src="{{ asset($image->url) }}"
                                         alt="First slide">

                                </div>

                            @endforeach

                        </div>

                        <a class="left carousel-control" href="#mycarousel" role="button"
                           data-slide="prev">

                                                <span class="glyphicon glyphicon-chevron-left"
                                                      aria-hidden="true"></span>

                            <span class="sr-only">Previous</span>

                        </a>
                        <a class="right carousel-control" href="#mycarousel" role="button"
                           data-slide="next">

                                                <span class="glyphicon glyphicon-chevron-right"
                                                      aria-hidden="true"></span>

                            <span class="sr-only">Next</span>

                        </a>
                    </div>

                    <div class="col-6 col-md-4 border border-primary" style="margin-top: 4%">
                        <form class="needs-validation"
                              action="{{ route('report.update',$reports->id) }}"
                              novalidate
                              method="POST">
                            @csrf
                            @method('PUT')
                            <div style=" width: 599px;">
                                <div class="form-group mb-4">
                                    <label for="validationCustom01">Title</label>
                                    <input type="text" name="report_id"
                                           value="{{ $reports->id ?? '' }}"
                                           class="form-control"
                                           id="validationCustom01" required>
                                    {{ $reports->title ?? '' }}
                                    <span class="text-muted"></span>
                                </div>
                                @error('detail')
                                <p style="color: red"> {{ $message }}</p>
                                @enderror
                                <div class="form-group mb-4">
                                    <label for="validationCustom01">Para no</label>
                                    <input type="text" name="para_no" class="form-control"
                                           id="validationCustom01" required>
                                    <span class="text-muted"></span>
                                </div>
                                @error('para_no')
                                <p style="color: red"> {{ $message }}</p>
                                @enderror
                                <div class="form-group mb-4">
                                    <label for="validationCustom01">Comments</label>
                                    <textarea class="form-control"
                                              name="comments"
                                              id="exampleFormControlTextarea1" rows="3"
                                              style="width: 100%; height: 150px;padding: 12px 20px;
                                              box-sizing: border-box;border: 2px solid #ccc;  border-radius: 4px;
                                                 font-size: 16px;  resize: none;">
                                                                </textarea>
                                    <span class="text-muted"></span>

                                </div>
                                @error('comments')
                                <p style="color: red"> {{ $message }}</p>
                                @enderror
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
    </div>


    <script>
        document.querySelector('.carousel-inner > div:first-child').classList.add('active');
    </script>

@endsection

