<?php

namespace App\DataTables;
use App\CRM\DataTable\BaseDataTable;

use App\Models\BillboardOwnership;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BillboardOwnershipDataTable extends BaseDataTable
{
    public $tableId = 'billboardownerships';
    public $createRoute = 'addownership';
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
                if (!empty($request->get('name'))) {
                    $instance->where('name', ($db_connection === 'mysql') ? 'LIKE' : 'ILIKE', "%" . $request->get('name') . "%");
                }
            })

            ->addColumn('actions', 'pages.billboardownerships.actions')
            ->rawColumns(["actions"]);


    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BillboardOwnership $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BillboardOwnership $model)
    {
        return $model->newQuery();
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
            ->pageLength(10)
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

            Column::make('id'),
            Column::make('name'),
            Column::make('contact_no')->title('Contact'),
            Column::make('whatsapp_number')->title('Whatsapp Number'),
            Column::make('website')->title('Website'),
            Column::make('email')->title('Email'),
            Column::make('office_address')->title('Office Address'),
            Column::make('lease_time')->title('Lease Time'),


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
            'name' => ['title' => 'Billboard Ownership Name', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
//            'last_name' => ['title' => 'Last Name', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BillboardOwnership_' . date('YmdHis');
    }
}
