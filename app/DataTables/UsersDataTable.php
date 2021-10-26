<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m/Y h:i A');
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d/m/Y h:i A');
            })
            ->addColumn('action', function ($data) {
                return '
                    <form action="' . route('admin.users.destroy', $data->id) . '" method="POST">
                        <a class="d-inline-block" href="' . route('admin.users.edit', $data->id) . '" title="Edit"><i class="bx bx-edit text-primary h5"></i></a>
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                        <button type="submit" class="d-inline-block bg-transparent border-0" title="Detete" onclick="return confirm(\'Are You Sure Want to Delete?\')"><i class="bx bx-trash text-danger h5"></i></button>
                    </form>
                ';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Jenssegers\Mongodb\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('usersdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            // ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
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
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('email_verified_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
