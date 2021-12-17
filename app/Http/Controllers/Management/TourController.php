<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Services\TourService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TourController extends Controller
{
    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    public function index()
    {
        return view('management.tours.index');
    }

    public function create()
    {
        return view('management.tours.create');
    }

    public function edit(Tour $tour)
    {
        return view('management.tours.edit', ['tour' => $tour]);
    }

    public function store(Request $request)
    {
        $this->tourService->store($request);

        return redirect()->route('management.tour.index')->with('message', 'Lưu thành công!');
    }

    public function update(Tour $tour, Request $request)
    {
        $this->tourService->update($tour, $request);

        return redirect()->route('management.tour.index')->with('message', 'Update thành công!');
    }

    public function delete(Tour $tour)
    {
        $this->tourService->delete($tour);

        return redirect()->route('management.tour.index')->with('message', 'Xóa thành công');
    }

    public function getData()
    {
        $tours = Tour::query()->get();

        return Datatables::of($tours)
            ->editColumn('price', function ($tour) {
                return $tour->type == Tour::TYPE_DISCOUNT ? number_format($tour->price_promotion) : number_format($tour->price);
            })
            ->editColumn('display', function ($tour) {
                $checked = '';
                if ($tour->display == Tour::DISPLAY) {
                    $checked = 'checked';
                }
                return '<label class="switch">
                            <input type="checkbox" value="1" ' .$checked .' data-id="'. $tour->id .'" onchange="checkDisplay(this)">
                            <div class="slider round">
                            <span class="off">Ẩn</span>
                            <span class="on">Hiện</span>
                            </div>
                        </label>';
            })
            ->editColumn('created_by', function ($tour) {
                return $tour->createdBy->name;
            })
            ->addColumn('action', function ($tour) {
                return '<a href="'. route('management.tour.edit', $tour) .'" class="btn btn-xs btn-warning">Chỉnh sửa</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management.tour.delete', $tour) . '"' . '>Xóa</a>';
            })
            ->rawColumns(['action', 'display'])
            ->make(true);
    }

    public function display(Request $request)
    {
        $id = $request->input('id', null);
        $response['status'] = 0;
        $response['message'] = 'Cập nhật thất bại';

        if (isset($id)) {
            $tour = Tour::find($id);
            $tour->display = !$tour->display;
            $tour->save();

            $response['status'] = 1;
            $response['message'] = 'Cập nhật thành công';
        }

        return response()->json($response);
    }
}
