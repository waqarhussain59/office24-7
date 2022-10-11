<?php

namespace App\DataTables;

use App\CRM\DataTable\BaseDataTable;
use App\Models\BillBoard;
use App\Models\Company;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BillboardDataTable extends BaseDataTable
{
    public $tableId = 'billboards';
    public $createRoute = 'addbillboard';
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
            ->addColumn('project_name',function ($project){
                return $project->project->project_name ?? '';
            })
            ->addColumn('company_name',function ($project){
                return $project->company->company_name ?? '';
            })
            ->addColumn('city_name',function ($city){
                return $city->city->city_name ?? '';
            })
            ->addColumn('actions', 'pages.billboards.actions')
            ->rawColumns(["actions","project_name","company_name","city_name"]);

    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\City $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BillBoard $model)
    {
        $request =   request();
        $unique_code_arr = [];
        $db_connection      =   env('DB_CONNECTION');
        $builder = '';
        if (auth()->user()->role_id == '1'){
            $builder = BillBoard::with(['project','company', 'city',])->orderBy('id','desc');
        }
        else{
            $builder = BillBoard::where('assign_to_user','=',auth()->user()->id)
                ->with(['project','company', 'city',])->orderBy('id','desc');
        }


        if (!empty($request->get('company_name'))) {
            $builder->whereHas('company', function($q) use($db_connection, $request){
                return $q->where('company_name', ($db_connection === 'mysql') ? 'LIKE' : 'LIKE', "%" . $request->get('company_name') . "%");
            });
        }
        if (!empty($request->get('project_name'))) {
            $builder->whereHas('project', function($q) use($db_connection, $request){
                return $q->where('project_name', ($db_connection === 'mysql') ? 'LIKE' : 'LIKE', "%" . $request->get('project_name') . "%");
            });
        }
        if (!empty($request->get('city_name'))) {
            $builder->whereHas('city', function($q) use($db_connection, $request){
                return $q->where('city_name', ($db_connection === 'mysql') ? 'LIKE' : 'LIKE', "%" . $request->get('city_name') . "%");
            });
        }
       // dd($builder);
        return $builder;
//            ->orderBy('id','desc')
//            ->newQuery();
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

//            Column::make('id'),
            Column::make('title')->title('Tracking Point Name'),
            Column::make('road_name'),
            Column::make('company_name')->name('comapny_name' ?? '')->title('Company'),
//            Column::computed('company_name')
//                ->exportable(true)
//                ->printable(true)
//                ->width(140)
//                ->addClass('text-center'),
            Column::make('city_name')->name('city_name' ?? '')->title('City'),

            Column::make('project_name')->name('project_name' ?? '')->title('Project'),
            Column::make('placement'),
            Column::make('created_at'),
//            Column::make('updated_at'),
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
            'title' => ['title' => 'Tracking Point Name', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
            'company_name' => ['title' => 'Company', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
            'city_name' => ['title' => 'City', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
            'project_name' => ['title' => 'Project', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Billboard_' . date('YmdHis');
    }
}
