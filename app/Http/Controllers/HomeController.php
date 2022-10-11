<?php

namespace App\Http\Controllers;

use App\DataTables\ReportDataTable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ReportDataTable $dataTable)
    {
        return $dataTable->render('office.index');
//        return view('office.report_create');
    }
}
