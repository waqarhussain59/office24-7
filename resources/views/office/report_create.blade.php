@extends('layouts.app')

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
                                                    <input type="text" name="title" class="form-control"
                                                           id="validationCustom01" required>
                                                    <span class="text-muted"></span>
                                                </div>
                                                @error('detail')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror
                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Remarks</label>
                                                    <input type="longText" name="remarks" class="form-control"
                                                           id="validationCustom01" required>

                                                    <span class="text-muted"></span>

                                                </div>
                                                @error('remarks')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror

                                                <div class="form-group mb-4">
                                                    <label for="validationCustom01">Status</label>
                                                    <select class="custom-select" name="status" required>
                                                        <option >Select</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                    <span class="text-muted"></span>
                                                </div>
                                                @error('status')
                                                <p style="color: red"> {{ $message }}</p>
                                                @enderror
                                                <div class=" mb-4 d-flex flex-column mt-4">
                                                    <label for="validationCustom01">Created By</label>
                                                    <input name="created_user_id" class="form-control" value="{{ auth()->user()->name ?? '' }}"
                                                           id="validationCustom01" placeholder="" required>
                                                    <span class="text-muted"></span>
                                                </div>
                                                @if(auth()->user()->role_id == '1')
                                                    <div class=" mb-4 d-flex flex-column mt-4">
                                                        <label for="validationCustom01">Updated by</label>
                                                        <input name="updated_user_id" class="form-control" value="{{ auth()->user()->name ?? '' }}"
                                                               id="validationCustom01" placeholder="" required>
                                                        <span class="text-muted"></span>
                                                    </div>
                                                @endif
                                                <div class=" mb-4 d-flex flex-column mt-4">
                                                    <label for="validationCustom01">Image</label>
                                                    <input type="file" name="images[]" class="file-control mt-1"
                                                           id="validationCustom01" placeholder="" required multiple>
                                                    <span class="text-muted"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-center" style="padding-right: 8%">
                                            <label for="validationCustom01"></label>
                                            <button class="btn btn-primary mt-4 mb-4 "
                                                    style="background-color: #C43554; width: 25%" type="submit">Submit
                                                form
                                            </button>
                                            <span class="text-muted"></span>
                                        </div>
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
