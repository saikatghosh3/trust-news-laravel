<?php

namespace Modules\Menu\DataTables;

use App\Models\NewsMst;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Menu\Entities\Menu;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MenuDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                $html = '';
                $className = "";

                if (auth()->user()->can('update_menu_setup')) {
                    $className = "update-status-button";
                }

                if ($row->status == 1) {
                    $html .= '<span class="btn btn-labeled btn-success mb-2 mr-1 '.$className.'" title="' . localize('publish') . '" data-action="' . route('menu.update-status', ['menu' => $row->id]) . '" data-update_status="0" >' . localize('publish') . '</span>';
                } else {
                    $html .= '<span class="btn btn-labeled btn-warning mb-2 mr-1 '.$className.'" title="' . localize('unpublish') . '" data-action="' . route('menu.update-status', ['menu' => $row->id]) . '" data-update_status="1" >' . localize('unpublish') . '</span>';
                }

                return $html;
            })
            ->addColumn('action', function ($row) {
                $button = '';

                if (auth()->user()->can('create_menu_setup')) {
                    $button .= '<a href="' . route('menu.setup.create', ['menu' => $row->id]) . '" class="btn btn-success-soft btn-sm me-1" data-bs-toggle="tooltip" title="'.localize("setup").'" ><i class="fas fa-gears"></i></a>';
                }

                return $button;
            })

            ->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Menu $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Menu $model)
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
            ->setTableId('category-table')
            ->setTableAttribute('class', 'table table-hover table-bordered align-middle table-sm')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->language([
                'processing' => '<div class="lds-spinner">
                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
            ])
            ->responsive(true)
            ->selectStyleSingle()
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']])
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            ->buttons([
                Button::make('csv')
                    ->className('btn btn-secondary buttons-csv buttons-html5 btn-sm prints')
                    ->text('<i class="fa fa-file-csv"></i> CSV')->exportOptions(['columns' => [0, 1, 2]]),
                Button::make('excel')
                    ->className('btn btn-secondary buttons-excel buttons-html5 btn-sm prints')
                    ->text('<i class="fa fa-file-excel"></i> Excel')
                    ->extend('excelHtml5')->exportOptions(['columns' => [0, 1, 2]]),
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title(localize('sl'))
                ->addClass('text-center column-sl')
                ->width(50)
                ->searchable(false)
                ->orderable(false),

            Column::make('name')->title(localize('name')),
            Column::make('status')->title(localize('status')),
            Column::make('action')
                ->title(localize('action'))->addClass('column-sl')->orderable(false)
                ->searchable(false)
                ->printable(false)
                ->exportable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Menu_' . date('YmdHis');
    }

}
