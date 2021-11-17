<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Yajra\DataTables\DataTables;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function datatable($datas = [], $names = [])
    {

        return Datatables::of($datas)
            ->editColumn('created_by', function ($tour) use ($names){
                return $names[$tour->created_by]['name'];
            })
            ->editColumn('description', function ($data){
                return html_entity_decode($data->description);
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('management.post.create') . '" class="btn btn-xs btn-success"><i class="fa fa-new"></i>Create</a>
                        <a href="'. route('management.post.edit', $data->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management-post.delete', $data->id) . '"' . '><i class="fa fa-times"></i> Delete</a>';
            })
            ->make(true);
    }
}
