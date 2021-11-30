<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            $this->save($post, $request);
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
        
        return $post->save();
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
}
