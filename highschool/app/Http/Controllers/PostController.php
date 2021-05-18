<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'frontPageIndex');
        $this->middleware('can:admin')->except('show', 'frontPageIndex');
    }

    public function index()
    {
        return view('admin.post.index', ['posts' => Post::with('postCategory')->where('lang', $this->getLang())->orderby('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create', ['categories' => Category::where('lang', $this->getLang())->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'is_published' => boolval($request->is_published),
            'author' => $request->author,
            'lang' => $request->lang,
            'slug' => $request->slug,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.post.edit', ['post' => Post::findorFail($id), 'categories' => Category::where('lang', $this->getLang())->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        Post::findorFail($post->id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'is_published' => boolval($request->is_published),
            'author' => $request->author,
            'lang' => $request->lang,
            'slug' => $request->slug,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : $post->picture,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::findorFail($post->id)->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
    }



    public function frontPageIndex()
    {
        return view('post.index', [
            'posts' => Post::where('lang', $this->getLang())->paginate(6),
        ]);
    }

    private function getLang()
    {
        if (!isset($_COOKIE['language'])) {
            return 'uz';
        }
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
    }
}
