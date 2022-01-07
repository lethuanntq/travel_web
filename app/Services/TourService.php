<?php

namespace App\Services;

use App\Models\Tour;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourService extends BaseService
{
    public function store(Request $request)
    {
        $rules = Tour::rules();
        $attrs = Tour::attributes();
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $tour = new Tour();
            $tour->created_by = $operator->id;
            $tour->updated_by = $operator->id;
            $this->save($tour, $request);

            DB::commit();
        } catch (Exception $e) {
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
        $operator = Auth::user();
        $tour->updated_by = $operator->id;

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $this->save($tour, $request);

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Tour $tour)
    {
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $tour->delete();
            $tour->deleted_by = $operator->id;
            $tour->updated_by = $operator->id;

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }

    public function save(Tour $tour, Request $request)
    {
        $tour->slug = Str::slug($request->tour['title'], '-').'-'.strtotime("now");
        $tour->destination_slug = Str::slug($request->tour['destination_name'], '-');
        $tour->display = Tour::DISPLAY;
        $tour->fill($request->input('tour'));
        $tour->save();
        $this->saveThumbnail($tour, $request->file('tour.thumbnail'));

        return $tour;
    }

    private function saveThumbnail(Tour $tour, $file)
    {
        if ($file) {
            $folder = Tour::PATH . $tour->id . '/thumbnail/';
            if (Storage::exists($folder)) {
                Storage::deleteDirectory($folder);
            }
            $path = Storage::putFile(Tour::PATH . $tour->id . '/thumbnail', $file);
            $tour->thumbnail = Storage::url($path);

            return $tour->save();
        }
    }

    public function getTourByDestination($destination_slug)
    {
        return Tour::where('destination_slug', $destination_slug)->where('display', Tour::DISPLAY)->get();
    }

    public function detail($slug)
    {
        return Tour::where('slug', $slug)->where('display', Tour::DISPLAY)->first();
    }

    public function rating(Request $request){
        $ratingData = $request->all();
        $tour = Tour::findOrFail($ratingData['id']);
        Session::put('rating_'.$ratingData['id'], '1');
        if($ratingData['type'] == 'like'){
            $tour->like = $tour->like + 1;
            return $tour->save();
        }
        $tour->dislike = $tour->dislike + 1;
        return $tour->save();
    }
}
