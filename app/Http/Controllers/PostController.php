<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:post-list', ['only' => ['index', 'store', 'show']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        return  view("news.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePostRequest $request, Post $post)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->save();

        if ($post) {
            $request->session()->flash('success', 'Post cadastrado com sucesso');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar o Post');
        }
        return redirect()->route('post.index')
            ->with('message', 'Noticia cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (Gate::denies('view', $post))
            abort(403, 'Unauthorized');
        return view('news.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Gate::denies('view', $post))
            abort(403, 'Unauthorized');

        return view('news.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostRequest $request, Post $post)
    {
        if (!$post) {
            return redirect()->back();
        }
        if (Gate::denies('view', $post))
            abort(403, 'Unauthorized');

        $data = $request->all();
        $post->update($data);
        return redirect()
            ->route("post.index")
            ->with('message', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!$post) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()
            ->route("post.index")
            ->with('message', 'Notícia deletada com sucesso!');
    }

    /**
     * Funcao que realiza a busca por posts
     */
    public function search(Request $request)
    {
        $filters = $request->except('_toker');
        $posts = Post::where('title', '=', $request->search)
            ->orWhere('content', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('news.index', compact('posts', 'filters'));
    }
}
