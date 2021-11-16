<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\User;
use App\Services\TourService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManagementTourController extends Controller
{
    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    public function index()
    {
        session(['title' => 'Quản lý tour']);
        return view('management-tours.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới tour']);
        return view('management-tours.create');
    }

    public function edit(Tour $tour)
    {
        return view('management-tours.edit', ['tour' => $tour]);
    }

    public function store(Request $request)
    {
        $this->tourService->store($request);

        return redirect()->route('management-tour.index')->with('message', 'Lưu thành công!');
    }

    public function update(Tour $tour, Request $request)
    {
        $this->tourService->update($tour, $request);

        return redirect()->route('management-tour.index')->with('message', 'Update thành công!');
    }

    public function getData()
    {
        $tours = Tour::query()->select(['id', 'title', 'description', 'price', 'start_date', 'end_date', 'created_by'])->get();
        $names = User::query()->select(['id', 'name'])->get()->keyBy('id');

        return Datatables::of($tours)
            ->editColumn('created_by', function ($tour) use ($names){
                return $names[$tour->created_by]['name'];
            })
            ->editColumn('description', function ($tour){
                return html_entity_decode($tour->description);
            })
            ->addColumn('action', function ($tour) {
                return '<a href="' . route('management-tour.create') . '" class="btn btn-xs btn-success"><i class="fa fa-new"></i>Create</a>
                        <a href="'. route('management-tour.edit', $tour->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management-tour.delete', $tour->id) . '"' . '><i class="fa fa-times"></i> Delete</a>';
            })
            ->make(true);
    }
}
