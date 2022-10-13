@extends('layouts.master')

@section('content')
    <div class="main-content">

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="header-title p-3">Add Report</h2>
                                <p class="card-title-desc">
                                </p>
                                <form class="needs-validation" action="{{ route('report.store') }}"
                                      enctype='multipart/form-data' novalidate
                                      method="POST"
                                      name="myform">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Title</label>
                                                    <input type="text" name="title"
                                                           class="form-control"
                                                           id="validationCustom01"
                                                           placeholder="Subscription Duration" required>
                                                    <span class="text-muted"></span>
                                                </div>
                                                @error('title')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror
                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Created By</label>
                                                    <input name="created_user_id" class="form-control" value="{{ auth()->user()->name ?? '' }}"
                                                           id="validationCustom01" placeholder="" required>
                                                    <span class="text-muted"></span>

                                                </div>
                                                @error('images')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror


                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Status</label>
                                                    <select class="custom-select" name="status"
                                                            required>
                                                        <option selected disabled>Select</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                                @error('subscription_duration')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="mt-4 mt-lg-0">
                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Petitioner</label>
                                                    <input type="text" name="petitioner"
                                                           class="form-control"
                                                           id="validationCustom01"
                                                           placeholder="Subscription Duration" required>
                                                    <span class="text-muted"></span>
                                                </div>
                                                @error('petitioner')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror
                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Wirt Petition No</label>
                                                    <input type="text" name="writ_petition_no"
                                                           class="form-control"
                                                           id="validationCustom01"
                                                           placeholder="Subscription Duration" required>
                                                    <span class="text-muted"></span>
                                                </div>
                                                @error('writ_petition_no')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror
                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Image</label>
                                                    <input type="file" name="images[]" class="file-control mt-1"
                                                           id="validationCustom01" placeholder="" required multiple>
                                                    <span class="text-muted"></span>

                                                </div>
                                                @error('images')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group d-flex justify-content-center"
                                         style="padding-right: 3%;margin-left: 37%;padding-top: 3%">
                                        <label for="validationCustom01"></label>
                                        <button class="btn btn-primary mt-4 mb-4 "
                                                style="align-items: center; background-color: green; width: 40%" type="submit">
                                            Submit
                                            form
                                        </button>
                                        <span class="text-muted"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
