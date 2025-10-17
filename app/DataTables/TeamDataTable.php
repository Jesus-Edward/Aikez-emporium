<?php

namespace App\DataTables;

use App\Models\Team;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class TeamDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.team.edit', $query->id) . '" class="btn btn-primary bt mr-2"><i class="bx bx-edit"></i></a>';
                $delete = '<a href="' . route('admin.team.destroy', $query->id) . '" class="btn btn-danger  bt delete-item"><i class="bx bx-trash"></i></a>';
                return $edit . $delete;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" class="rounded-circle" width="50" height="50" alt="">';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return "<span class='badge bg-primary'>Active</span>";
                } elseif ($query->status === 0) {
                    return "<span class='badge bg-danger'>Inactive</span>";
                }
            })
            ->addColumn('name', function($query) {
                $name = $query->name;
                return "<span class=''>$name</span>";
            })
            ->addColumn('role', function ($query) {
                $role = $query->role;
                return "<span class=''>$role</span>";
            })
            ->addColumn('facebook', function ($query) {
                $facebook = Str::limit($query->facebook, 50, '...') ?? 'N/A';
                return "<span class=''>$facebook</span>";
            })
            ->addColumn('twitter', function ($query) {
                $twitter = Str::limit($query->twitter, 50, '...') ?? 'N/A';
                return "<span class=''>$twitter</span>";
            })
            ->addColumn('gmail', function ($query) {
                $gmail = Str::limit($query->gmail, 50, '...') ?? 'N/A';
                return "<span class=''>$gmail</span>";
            })
            ->addColumn('created_at', function ($query) {
                return "<span class='badge bg-dark'>$query->created_at</span>";
            })
            ->addColumn('updated_at', function ($query) {
                return "<span class='badge bg-dark'>$query->updated_at</span>";
            })
            ->rawColumns(['action', 'image', 'status', 'name', 'role', 'facebook', 'twitter', 'gmail', 'created_at', 'updated_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Team $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('team-table')
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
            Column::make('image'),
            Column::make('name'),
            Column::make('role'),
            Column::make('status'),
            Column::make('gmail'),
            Column::make('facebook'),
            Column::make('twitter'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Team_' . date('YmdHis');
    }
}
