<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class ProductDataTable extends DataTable
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
                $edit = '<a href="' . route('admin.product.edit', $query->id) . '" class="btn btn-primary bt mr-2"><i class="bx bx-edit"></i></a>';
                $delete = '<a href="' . route('admin.product.destroy', $query->id) . '" class="btn btn-danger  bt delete-item"><i class="bx bx-trash"></i></a>';
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
            ->addColumn('title', function ($query) {
                return "<span class=''>$query->name</span>";
            })
            ->addColumn('slug', function ($query) {
                return "<span class=''>$query->slug</span>";
            })
            // ->addColumn('category', function ($query) {
            //     $category = $query->category->name;
            //     return "<span class=''>$category</span>";
            // })
            ->addColumn('brand', function ($query) {
                $brand = $query->brand->name;
                return "<span class=''>$brand</span>";
            })
            ->addColumn('price', function ($query) {
                return "<span class=''>$query->price</span>";
            })
            ->addColumn('quantity', function ($query) {
                return "<span class=''>$query->quantity</span>";
            })
            ->addColumn('size', function ($query) {
                $size = $query->size->name;
                return "<span class=''>$size</span>";
            })
            ->addColumn('texture', function ($query) {
                return "<span class=''>$query->texture</span>";
            })
            ->addColumn('seo_title', function ($query) {
                return "<span class=''>$query->seo_title</span>";
            })
            ->addColumn('description', function ($query) {
                $description = Str::limit($query->short_description, 50, '...');
                return "<span class=''>$description</span>";
            })
            ->addColumn('created_at', function ($query) {
                return "<span class='badge bg-dark'>$query->created_at</span>";
            })
            ->rawColumns(['action', 'image', 'status', 'brand', 'description', 'slug', 'name', 'created_at', 'texture', 'size', 'quantity', 'price', 'seo_title'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
            Column::make('slug'),
            // Column::make('category'),
            Column::make('brand'),
            Column::make('price'),
            Column::make('quantity'),
            Column::make('texture'),
            Column::make('size'),
            Column::make('description'),
            Column::make('status'),
            Column::make('created_at'),
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
        return 'Product_' . date('YmdHis');
    }
}
