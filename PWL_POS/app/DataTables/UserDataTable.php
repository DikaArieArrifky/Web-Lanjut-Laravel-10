<?php

namespace App\DataTables;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('user.edit', $row->user_id) . '" class="btn btn-sm btn-primary">Ubah</a>
                    <form action="' . route('user.destroy', $row->user_id) . '" method="POST" style="display:inline">
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                        <button type="submit" class="btn btn-sm btn-danger" 
                            onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->setRowId('user_id');
    }
    
    public function query(UserModel $model): QueryBuilder
    {
        return $model->newQuery();
    }
    
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }
    
    public function getColumns(): array
    {
        return [
            Column::make('user_id')->title('User ID'),
            Column::make('level_id')->title('Level ID'),
            Column::make('username')->title('Username'),
            Column::make('nama')->title('Nama'),
            Column::make('password')->title('Password'),
            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-end')
        ];
    }
    
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}