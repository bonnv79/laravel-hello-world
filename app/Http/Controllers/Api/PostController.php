<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', ['res' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = Post::create($request->all());
        
        // return new PostResource($posts);
        // return view('post.create', ['res' => new PostResource($posts)]);

        return redirect(config('constants.ROUTER_PATH.POSTS.LIST'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // Request $request, Post $post
    {   
        $post = Post::findOrFail($id);
        $data = $request->all();
        // dd($post, $data);
        $res = $post->update($data);
        // return response(null, 204);
        return redirect(config('constants.ROUTER_PATH.POSTS.LIST'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(null, 204);
    }

    public function delete($id){
        $Post = Post::findOrFail($id);

        $Post->delete();
        
        // return response(null, 204);
        return redirect(config('constants.ROUTER_PATH.POSTS.LIST'));
    }

    public function view($id)
    {
        $post = Post::findOrFail($id);

        return view('post.view', compact('post'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $page = $request->input('page') ? $request->input('page') : 1;
        $pageSize = $request->input('pageSize') ? $request->input('pageSize') : config('constants.PAGE_SIZE');

        $intPage = (int)$page;
        $intPageSize = (int)$pageSize;
        
        // $posts = Post::where('title', 'LIKE', "%$search%")->orderBy('id', 'DESC')->get();
        $posts = Post::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orderBy('id', 'DESC')
                    ->paginate(
                        $perPage = $intPageSize, $columns = ['*'], $pageName = 'posts', $currentPage = $intPage
                    );
        
        // dd($search);
        return view('home', compact('posts', 'search'));
    }

    public function list($page = 1, $pageSize = 10)
    {
        $intPage = (int)$page;
        $intPageSize = (int)$pageSize;
        
        $posts = Post::where('id', '>', 0)->orderBy('id', 'DESC')->paginate(
            $perPage = $intPageSize, $columns = ['*'], $pageName = 'posts', $currentPage = $intPage
        ); 
        $search = '';
        // dd($posts, $intPage,  $intPageSize);
        return view('post.list', compact('posts', 'search'));

        // $posts = Post::all();
        // return view('post.list', ['posts' => $posts]);
    }

    public function filter(Request $request){
        $search = $request->input('search');
        $page = $request->input('page') ? $request->input('page') : 1;
        $pageSize = $request->input('pageSize') ? $request->input('pageSize') : 10;
        $sort = $request->input('sort') ? $request->input('sort') : 'DESC';
        $sortBy = $request->input('sortBy') ? $request->input('sortBy') : 'id';

        $intPage = (int)$page;
        $intPageSize = (int)$pageSize;
  
        // $posts = Post::query()
        //             ->where('title', 'LIKE', "%{$search}%")
        //             ->orWhere('description', 'LIKE', "%{$search}%")
        //             ->get();
        
        $posts = Post::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orderBy($sortBy, $sort)
                    ->paginate(
                        $perPage = $intPageSize, $columns = ['*'], $pageName = 'posts', $currentPage = $intPage
                    );
        // dd($page, $pageSize);
        return view('post.list', compact('posts', 'search', 'sort', 'sortBy'));
    }

    public function apiList(Request $request)
    {
        $reqBody = $request->all();
       
        $search = $reqBody['search'] ? $reqBody['search'] : '';
        $page = $reqBody['page'] ? $reqBody['page'] : 1;
        $pageSize = config('constants.PAGE_SIZE');

        // dd($reqBody, $reqBody['search'], $reqBody['page']);

        $intPage = (int)$page;
        $intPageSize = (int)$pageSize;

        $posts = Post::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orderBy('id', 'DESC')
                    ->paginate(
                        $perPage = $intPageSize, $columns = ['*'], $pageName = 'posts', $currentPage = $intPage
                    );

        // return response(null, 204);
        return PostResource::collection($posts);
    }
}