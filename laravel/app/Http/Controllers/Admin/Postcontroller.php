<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Str;


class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->orderBy('created_at', 'desc')->limit(20)->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'published_at' => 'nullable|date|before_or_equal:today',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ]);

        $data = $request->all();

        $slug = Post::getUniqueSlug( $data['title'] );
        
        // $slug = Str::slug( $data['title'] );
        // $slug_base = $slug;
        // $counter = 1;

        // $post_present = Post::where('slug', $slug)->first();

        // while( $post_present ) {
        //     $slug = $slug_base . '-' . $counter;
        //     $counter++;
        //     $post_present = Post::where('slug',$slug)->first();
        // }

        $post = new Post();
        $post->fill( $data );
        $post->slug = $slug;

        $post->save();

        return redirect()->route('admin.posts.index');
        // dd($request->all());
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'published_at' => 'nullable|date|before_or_equal:today',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ]); 


        $data = $request->all();

        $slug = Post::getUniqueSlug( $data['title'] );

        if( $post->title != $data['title'] ) {

            $slug = Post::getUniqueSlug( $data['title'] );
            // $slug = Str::slug( $data['title'] );
            // $slug_base = $slug;
            // $counter = 1;

            // $post_present = Post::where('slug', $slug)->first();

            // while( $post_present ) {
            //     $slug = $slug_base . '-' . $counter;
            //     $counter++;
            //     $post_present = Post::where('slug',$slug)->first();
            // }
            $data['slug'] = $slug;
        }

        $ids = array_key_exists('tags', $data) ? $data['tags'] : [];
        $post->tags()->sync( $ids );

        //     OPPURE
        // if( array_key_exists('tags', $data) ) {
        //     $post->tags()->sync( $data['tags'] );
        // } else {
        //     $post->tags()->sync( [] );
        // }


        $post->update($data);
        
        // dd($data);
        
        
        return redirect()->route('admin.posts.index');
        // $post = new Post();

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index') ;
    }
}
