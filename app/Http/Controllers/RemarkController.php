<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function comments(Request $request, $id)
    {
       ;
        $reports = Report::findOrFail($id);
        //list_surveydd($billboards);

//        $detailschedule = $billboards->survey_details;
        // dd($survey_details);
        $comments = $reports->remarks;
        // dump($surveys);
        return view('office.view', compact('reports','comments'));
    }
}
