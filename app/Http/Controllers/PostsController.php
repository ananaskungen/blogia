<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $categories = Category::all();
        $tags = Tag::all();
    
        return view('posts.create', compact('categories', 'tags'));
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

        $file = $request->file('file_path_attachment');
        if ($file) {
            $filePath = $file->store('public/uploads');
            $post->file_path_attachment = Storage::url($filePath);
        }

        $tags = $request->input('tags', []);
        $post->save();
        $post->tags()->attach($tags, ['post_id' => $post->id]);
    
    
        return redirect('posts');


    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
   
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
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
        $categories = Category::all();
        $tags = Tag::all();
   
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
    

    public function update(Request $request, Post $post)
    {
        if ($request->hasFile('file_path_attachment')) {
            $file = $request->file('file_path_attachment');
            if ($file->isValid()) {
                $temporaryFilePath = $file->getRealPath();
                $newFilePath = 'public/uploads/' . $file->hashName();
    
                Storage::put($newFilePath, file_get_contents($temporaryFilePath));
    
                $post->file_path_attachment = Storage::url($newFilePath);
            } else {
                // Log any error messages related to the attachment file upload
                $error = $file->getErrorMessage();
                Log::error('Attachment file upload error: ' . $error);
                return back()->with('error', 'Failed to upload attachment file.');
            }
        }
        
        $post->update($request->except(['tags', '_token', '_method'])); // Update all fields except the 'tags', '_token', and '_method' fields

        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags')); // Update the tags relationship
        } else {
            $post->tags()->detach(); // Remove all tags associated with the post
        }
    
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
