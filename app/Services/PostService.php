<?php


namespace App\Services;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Post;

class PostService extends BaseService
{
    public function store(Request $request)
    {
        $rules = Post::rules();
        $attrs = Post::attributes();
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $post = new Post();
            $this->save($post, $request);
            DB::commit();
        }catch (Exception $e) {
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
        DB::beginTransaction();
        try {
            $this->validate($request->all(), $rules, $attrs);
            $this->save($post, $request);
            DB::commit();
        }catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return $post;
    }

    public function save(Post $post, Request $request)
    {
        $operator = Auth::user();
        $post->title = $request->input('post.title');
        $post->seo_tag = $request->input('post.seo_tag');
        $post->seo_description = $request->input('post.seo_description');
        $post->key_word = $request->input('post.key_word');
        $post->description = $request->input('post.description');
        $post->created_by = $operator->id;
        $post->updated_by = $operator->id;
        $post->save();
    }

    public function delete(Post $post)
    {
        DB::beginTransaction();
        try{
            $post->delete();
            DB::commit();
        }catch(Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            throw $e;
        }

        return true;
    }
}
