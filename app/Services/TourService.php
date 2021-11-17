<?php


namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class TourService extends BaseService
{
    public function store(Request $request)
    {
        $rules = Tour::rules();
        $attrs = Tour::attributes();
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $tour = new Tour();
            $this->save($tour, $request);
            DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $tour;
    }

    public function update(Tour $tour, Request $request)
    {
        $rules = Tour::rules();
        $attrs = Tour::attributes();
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $this->save($tour, $request);
            DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }

    public function save(Tour $tour, Request $request)
    {
        $operator = Auth::user();
        $tour->title = $request->input('tour.title');
        $tour->description = $request->input('tour.description');
        $tour->price = $request->input('tour.price');
        $tour->price_promotion = $request->input('tour.price_promotion');
        $tour->key_word = $request->input('tour.key_word');
        $tour->seo_tag = $request->input('tour.seo_tag');
        $tour->seo_description = $request->input('tour.seo_description');
        $tour->start_date = $request->input('tour.start_date');
        $tour->end_date = $request->input('tour.end_date');
        $tour->created_by = $operator->id;
        $tour->updated_by = $operator->id;
        $tour->save();
    }


    public function delete(Tour $tour)
    {
        DB::beginTransaction();
        try{
            $tour->delete();
            DB::commit();
        }catch(Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }
}
