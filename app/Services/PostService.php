<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostService extends BaseService
{
    public function store(Request $request)
    {
        $rules = Post::rules();
        $attrs = Post::attributes();
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $post = new Post();
            $post->updated_by = $operator->id;
            $post->created_by = $operator->id;
            $post = $this->save($post, $request);
            $this->saveThumbnail($post, $request->file('post.thumbnail'));

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $post;
    }

    public function save(Post $post, Request $request)
    {
        $post->fill($request->input('post'));
        $post->save();

        return $post;
    }

    public function update(Post $post, Request $request)
    {
        $rules = Post::rules();
        $attrs = Post::attributes();
        $operator = Auth::user();
        $post->updated_by = $operator->id;

        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $post = $this->save($post, $request);
            $this->saveThumbnail($post, $request->file('post.thumbnail'));

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $post;
    }

    public function delete(Post $post)
    {
        $operator = Auth::user();

        DB::beginTransaction();
        try {
            $post->delete();
            $post->deleted_by = $operator->id;
            $post->updated_by = $operator->id;
            $post->save();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }

    private function saveThumbnail(Post $post, $file)
    {
        if($file) {
            $folder = Post::PATH . $post->id . '/thumbnail/';
            if (Storage::exists($folder)) {
                Storage::deleteDirectory($folder);
            }
            $path = Storage::putFile(Post::PATH . $post->id . '/thumbnail' , $file);
            $post->thumbnail = Storage::url($path);

            return $post->save();
        }
    }
}
