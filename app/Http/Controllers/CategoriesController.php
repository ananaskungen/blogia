<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoriesController extends Controller
{
    //

    public function index($username = null) {
        try {
            $user = User::where('name', $username)->firstOrFail();
            $categories = Category::where('user_id', $user->id)->get();
            return view('/categories', ['categories' => $categories]);
        } catch (ModelNotFoundException $e) {
            return abort(404, 'User not found');
        }
        
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request)
    {
   /*      $request->validate([
            'main_category_name' => 'required|string|max:255',
            'subcategories.*' => 'nullable|string|max:255',
        ]);
    
        $mainCategory = Category::create(['name' => $request->main_category_name]);
    
        $subcategories = array_filter($request->subcategories);
    
        foreach ($subcategories as $subcategoryName) {
            Subcategory::create([
                'name' => $subcategoryName,
                'category_id' => $mainCategory->id,
            ]);
        } */
    
        return redirect('categories');
    }

    public function edit(Category $category)
    {
       /*  $subcategories = $category->subcategories; */
        return view('categories.edit', [
            'category' => $category,
         /*    'subcategories' => $subcategories */
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
        $category = Category::find($id);
/*         $subcategories = $category->subcategories; */
    
        return view('categories.edit', [
            'category' => $category,
     /*        'subcategories' => $subcategories */
        ]);
    }
    

    public function update(Request $request, Category $category)
    {
      /*   $request->validate([
            'name' => 'required',
        ]); */
    
        $category->update($request->all());
    
        // Update subcategories
       /*  $subcategoriesData = $request->input('subcategories');
        if ($subcategoriesData) {
            foreach ($subcategoriesData as $id => $name) {
                $subcategory = Subcategory::find($id);
                $subcategory->update(['name' => $name]);
            }
        } */
    
        return redirect()->route('categories')->with('success', 'Working!');

    }
    

    public function destroy(Category $category)
    {
        //
        $category->delete();

		return redirect()
			->route('categories')
			->with('success', 'Succesfully DELETED!');
    } 


}
