<?php

namespace App\DataTables;

use App\Models\Size;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SizeDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.size.edit', $query->id) . '" class="btn btn-primary bt mr-2"><i class="bx bx-edit"></i></a>';
                $delete = '<a href="' . route('admin.size.destroy', $query->id) . '" class="btn btn-danger  bt delete-item"><i class="bx bx-trash"></i></a>';
                return $edit . $delete;
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return "<span class='badge bg-primary'>Active</span>";
                } elseif ($query->status === 0) {
                    return "<span class='badge bg-danger'>Inactive</span>";
                }
            })
            ->addColumn('name', function ($query) {
                $name = $query->name;
                return "<span class=''>$name</span>";
            })
            ->addColumn('created_at', function ($query) {
                return "<span class='badge bg-dark'>$query->created_at</span>";
            })
            ->addColumn('updated_at', function ($query) {
                return "<span class='badge bg-dark'>$query->updated_at</span>";
            })
            ->rawColumns(['action', 'status', 'name', 'created_at', 'updated_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Size $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('size-table')
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
            Column::make('name'),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Size_' . date('YmdHis');
    }
}
