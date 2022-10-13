<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DHCDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style type="text/css">
        table td, table th {
            border: 1px solid black;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="page-content">

        <div class="center-block">


            <div class="page-content-wrapper ">
                <div class="container-fluid">

                    <div class=" d-flex p-2 center-block">
                        <div class=" d-inline-flex " style="padding-bottom: 7%">
                            <div class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5  ">
                                <div style="padding-left: 70px">
                                    <h5 class="fw-bold justify-content-center">IN THE HONORABLE ISLAMABAD HIGH COURT,</h5>
                                    <h5 class="fw-bold text-center">ISLAMABAD</h5>
                                </div>


                                    <div class="fw-bold  text-end"style="padding-left: 30px">
                                        <b>Writ Petition No.:</b>&nbsp; {{ $reports->writ_petition_no ?? '' }} </div>
                            </div>
                            <div style="padding-left: 70px">
                                <p class="fw-normal ">{{ $reports->petitioner ?? '' }}</p>

                            </div>
                        </div>
                    </div>

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Para no</th>
                                                    <th>Remarks</th>
                                                    <th>Time</th>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous"></script>
</body>
</html>

