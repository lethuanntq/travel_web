<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            $post->slug = Str::slug($request->post['title'], '-').'-'.strtotime("now");
            $post->updated_by = $operator->id;
            $post->created_by = $operator->id;
            $this->save($post, $request);

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

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
            $post->slug = Str::slug($request->post['title'], '-').'-'.strtotime("now");
            $this->save($post, $request);

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

    public function save(Post $post, Request $request)
    {
        $post->fill($request->input('post'));
        $post->save();
        $this->saveThumbnail($post, $request->file('post.thumbnail'));

        return $post;
    }

    private function saveThumbnail(Post $post, $file)
    {
        if ($file) {
            $folder = Post::PATH . $post->id . '/thumbnail/';
            if (Storage::exists($folder)) {
                Storage::deleteDirectory($folder);
            }
            $path = Storage::putFile(Post::PATH . $post->id . '/thumbnail', $file);
            $post->thumbnail = Storage::url($path);

            return $post->save();
        }
    }
}
