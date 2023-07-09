<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends Controller
{
    public function index($username = null) {
        try {
            $user = User::where('name', $username)->firstOrFail();
            $posts = Post::where('user_id', $user->id)->get();
            return view('/posts', ['posts' => $posts]);
        } catch (ModelNotFoundException $e) {
            return abort(404, 'User not found');
        }
        
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = New Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->excerpt = request('excerpt');
        $post->file_path_attachment = request('file_path_attachment');
        $post->is_public = request('is_public');
        $post->user_id = Auth::user()->id;
        $category = Category::find($request->input('category_id'));
        if ($category) {
            $post->category_id = $category->id;
        }
        $post->save();
    

        return redirect('posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
       
        ]);
    }
    

          /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
   
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    

    public function update(Request $request, Post $post)
    {
      /*   $request->validate([
            'name' => 'required',
        ]); */
    
        $post->update($request->all());
    
        // Update subcategories
       /*  $subcategoriesData = $request->input('subcategories');
        if ($subcategoriesData) {
            foreach ($subcategoriesData as $id => $name) {
                $subcategory = Subcategory::find($id);
                $subcategory->update(['name' => $name]);
            }
        } */
    
        return redirect()->route('posts')->with('success', 'Working!');

    }
    

    public function destroy(Post $post)
    {
        //
        $post->delete();

		return redirect()
			->route('posts')
			->with('success', 'Succesfully DELETED!');
    } 


}
