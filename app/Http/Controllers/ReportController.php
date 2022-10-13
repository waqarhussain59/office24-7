<?php

namespace App\Http\Controllers;

use App\DataTables\ReportDataTable;
use App\Models\Remark;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class ReportController extends Controller
{

    public function index(ReportDataTable $dataTable)
    {
        return $dataTable->render('office.index');
//        return view('office.report_create');
    }

    public function create()
    {

        return view('office.report_create');
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $data = [
            'title' => $request->title,
            'petitioner' => $request->petitioner,
            'writ_petition_no' => $request->writ_petition_no,

            'status' => $request->status,
            'created_user_id' => $request->user()->id,
//            'updated_user_id' => $request->user()->id,



        ];
//        dd($data);
        $report = Report::create($data);
//        $image = $request->images;
//        $imageFile = $image->getClientOriginalName();
//        $image->move(public_path('images'), $report->id . $imageFile);
//        $report->images()->create([
//            'url' => ('images') . '/' . $report->id . '' . $imageFile,
//            'user_id' => $user->id,
//            'imageable_id' => $report->id,
//        ]);

        $images = $request->file('images');
//        dd($images);
        foreach ($images as $image) {
            /* Storing Files */
            $imageFile = $image->getClientOriginalName();
            $image->move(public_path('images'), $report->id . $imageFile);
            $report->images()->create([
                'url' => ('images') . '/' . $report->id . '' . $imageFile,
                'user_id' => $user->id,
                'imageable_id' => $report->id,
            ]);
        }

        return redirect()->route('report.list');

    }


    public function view(Request $request, $id)
    {
        $reports = Report::find($id);
        $comments = $reports->remarkss;

        return view('office.view', compact('reports', 'comments'));
    }

    public function edit($id)
    {
        $reports = Report::find($id);
        $user = auth()->user();
        $images = $reports->images;
//        dd($images);
        return view('office.show', compact('reports', 'user', 'images'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::where('title', 'LIKE', $request->report_id)->first();

        $user = auth()->user();
        $remark = Remark::create([
            'report_id' => $report->id,
            'para_no' => $request['para_no'],
//            'paras' => $request['end_date'],
            'comments' => $request['comments'],
        ]);

        if ($remark) {
            #Display Success Message in Blade File
            $arr = array('msg' => 'Comment Added successfully ', 'status' => true);
        }
        return Response()->json($arr);


    }

    public function generatePDF(Request $request, $id)
    {
        $reports = Report::find($id);
        $comments = $reports->remarkss;
//        dd($comments);
        view()->share(['reports' => $reports, 'comments' => $comments]);

        if (!empty($reports)) {
            $pdf = PDF::loadView('office.pdfview');
            return $pdf->download($reports->title.'.pdf');
        }


        return view('office.pdfview');
    }


}
