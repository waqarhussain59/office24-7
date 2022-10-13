<?php

namespace App\DataTables;

use App\CRM\DataTable\BaseDataTable;
use App\Models\BillBoard;
use App\Models\Company;
use App\Models\Report;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReportDataTable extends BaseDataTable
{
    public $tableId = 'reports';
    public $createRoute = 'report.create';
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $request = request();
        $db_connection = env('DB_CONNECTION');
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($request) {
                return $request->created_at->format('d-m-Y'); // human readable format
            })
            ->editColumn('updated_at', function ($request) {
                return $request->updated_at->format('d-m-Y'); // human readable format
            })
            ->filter(function ($instance) use ($request, $db_connection) {
                if (!empty($request->get('title'))) {
                    $instance->where('title', ($db_connection === 'mysql') ? 'LIKE' : 'LIKE', "%" . $request->get('title') . "%");
                }
            })

//
//            ->addColumn('company_name', 'billboards.company_name')
//            ->addColumn('project_name',function ($project){
//                return $project->project->project_name ?? '';
//            })
//            ->addColumn('company_name',function ($project){
//                return $project->company->company_name ?? '';
//            })
//            ->addColumn('city_name',function ($city){
//                return $city->city->city_name ?? '';
//            })
            ->addColumn('actions', 'office.actions')
            ->rawColumns(["actions"]);

    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Report $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Report $model)
    {
//        dd($model->newQuery());
       return $model
//            ->orderBy('id','desc')
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setFilters($this->getFilters())
            ->setTableId($this->tableId)
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->pageLength(30)
            ->buttons(
                $this->buttons()
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [


            Column::make('title')->name('title' ?? '')->title('Document Name'),
            Column::make('writ_petition_no')->name('writ_petition_no' ?? '')->title('writ Petition No'),
            Column::make('petitioner')->name('petitioner' ?? '')->title('Petitioner'),
            Column::make('status')->name('status' ?? '')->title('Status'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('actions')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    public function getFilters(): array
    {

        return [
            'title' => ['title' => 'Document Name', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Report_' . date('YmdHis');
    }
}
