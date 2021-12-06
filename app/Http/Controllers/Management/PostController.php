<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('management.posts.index');
    }

    public function create()
    {
        return view('management.posts.create');
    }

    public function edit(Post $post)
    {
        return view('management.posts.edit', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $this->postService->store($request);

        return redirect()->route('management.post.index')->with('message', 'Lưu thành công!');
    }

    public function update(Post $post, Request $request)
    {
        $this->postService->update($post, $request);

        return redirect()->route('management.post.index')->with('message', 'Update thành công!');
    }

    public function delete(Post $post)
    {
        $this->postService->delete($post);

        return redirect()->route('management.post.index')->with('message', 'Xóa thành công');
    }

    public function getData()
    {
        $posts = Post::query()->get();

        return Datatables::of($posts)
            ->editColumn('type', function ($post) {
                return Post::TYPES[$post->type];
            })
            ->editColumn('created_by', function ($post) {
                return $post->createdBy->name;
            })
            ->editColumn('highlight', function ($post) {
                $checked = '';
                if ($post->highlight == Post::HIGHLIGHT) {
                    $checked = 'checked';
                }
                return '<label class="switch">
                            <input type="checkbox" value="1" ' .$checked .' data-id="'. $post->id .'" onchange="priority(this)">
                            <div class="slider round">
                            <span class="on">✓</span>
                            <span class="off">✕</span>
                            </div>
                        </label>';
            })
            ->addColumn('action', function ($post) {
                return '<a href="' . route('management.post.edit', $post->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirm-modal"  data-action="' . route('management.post.delete',
                        $post->id) . '"' . '><i class="fa fa-times"></i></a>';
            })
            ->rawColumns(['action', 'highlight'])
            ->make(true);
    }

    public function highlight(Request $request)
    {
       $id = $request->input('id', null);
       $postHighlight = Post::query()->where('highlight', Post::HIGHLIGHT)->get();
       $response = [];

       if (isset($id)) {
           $post = Post::find($id);

           if ($postHighlight->count() >= Post::MAX_POSTS_HIGHLIGHT && $post->highlight != Post::HIGHLIGHT) {
               $response['status'] = 0;
               $response['message'] = 'Đã quá 5 bản ghi nổi bật';

               return response()->json($response);
           }

           $post->highlight = !$post->highlight;
           $post->save();

           $response['status'] = 1;
           $response['message'] = 'Cập nhật thành công';

           return response()->json($response);
       }

       return false;
    }
}
