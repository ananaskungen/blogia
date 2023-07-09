<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagsController extends Controller
{
    public function index($username = null) {
        try {
            $user = User::where('name', $username)->firstOrFail();
            $tags = Tag::where('user_id', $user->id)->get();
            return view('/tags', ['tags' => $tags]);
        } catch (ModelNotFoundException $e) {
            return abort(404, 'User not found');
        }
        
    }

    public function create() {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $tag = New Tag();
        $tag->name = request('name');
        $tag->slug = request('slug');
        $tag->save();
    

        return redirect('tags');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', [
            'tag' => $tag,
       
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
        $tag = Tag::find($id);
   
        return view('tags.edit', [
            'tag' => $tag,
        ]);
    }
    

    public function update(Request $request, Tag $tag)
    {
      /*   $request->validate([
            'name' => 'required',
        ]); */
    
        $tag->update($request->all());
    
        // Update subcategories
       /*  $subcategoriesData = $request->input('subcategories');
        if ($subcategoriesData) {
            foreach ($subcategoriesData as $id => $name) {
                $subcategory = Subcategory::find($id);
                $subcategory->update(['name' => $name]);
            }
        } */
    
        return redirect()->route('tags')->with('success', 'Working!');

    }
    

    public function destroy(Tag $tag)
    {
        //
        $tag->delete();

		return redirect()
			->route('tags')
			->with('success', 'Succesfully DELETED!');
    } 

}
