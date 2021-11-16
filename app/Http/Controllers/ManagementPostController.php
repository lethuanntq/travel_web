<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManagementPostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        session(['title' => 'Quản lý bài viết']);
        return view('management-posts.index');
    }

    public function create()
    {
        session(['title' => 'Tạo mới bài viết']);
        return view('management-posts.create');
    }

    public function edit(Post $post)
    {
        return view('management-posts.edit', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $this->postService->store($request);

        return redirect()->route('management-post.index')->with('message', 'Lưu thành công!');
    }

    public function update(Post $post, Request $request)
    {
        $this->postService->update($post, $request);

        return redirect()->route('management-post.index')->with('message', 'Update thành công!');
    }

    public function getData()
    {
        $posts = Post::query()->select(['id', 'title', 'description', 'seo_tag', 'seo_description', 'created_by'])->get();
        $names = User::query()->select(['id', 'name'])->get()->keyBy('id');
        return Datatables::of($posts)
            ->editColumn('created_by', function ($post) use ($names){
                return $names[$post->created_by]['name'];
            })
            ->editColumn('description', function ($post){
                return html_entity_decode($post->description);
            })
            ->addColumn('action', function ($post) {
                return '<a href="' . route('management-post.create') . '" class="btn btn-xs btn-success"><i class="fa fa-new"></i>Create</a>
                        <a href="'. route('management-post.edit', $post->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management-post.delete', $post->id) . '"' . '><i class="fa fa-times"></i> Delete</a>';
            })
            ->make(true);
    }
}
