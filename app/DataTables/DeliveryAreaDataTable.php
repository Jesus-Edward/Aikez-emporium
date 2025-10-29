<?php

namespace App\DataTables;

use App\Models\DeliveryArea;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DeliveryAreaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('admin.delivery-area.edit', $query->id) . '"
            class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="' . route('admin.delivery-area.destroy', $query->id) . '"
            class="btn btn-danger ml-2 delete-item"><i class="fas fa-trash"></i></a>';
                return $edit . $delete;
            })->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return '<span class="badge bg-primary">Active</span>';
                } else {
                    return '<span class="badge bg-danger">Inactive</span>';
                }
            })->addColumn('delivery_fee', function ($query) {
                return $query->delivery_fee;
                // return currencyPosition($query->delivery_fee);
            })
            ->addColumn('order_type', function ($query) {
                if ($query->order_type === 'buy_tiles') {
                    return '<span class="badge bg-primary">BOUGHT</span>';
                } elseif ($query->order_type === 'get_sample') {
                    return '<span class="badge bg-info">SAMPLE</span>';
                }
            })
            ->rawColumns(['action', 'status', 'delivery_fee'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DeliveryArea $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('deliveryarea-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('area_name'),
            Column::make('min_delivery_time'),
            Column::make('max_delivery_time'),
            Column::make('delivery_fee'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DeliveryArea_' . date('YmdHis');
    }
}
