
<x-admin-layout>
   

    <h1 class="p-4 text-4xl font-extrabold text-gray-700">Edit</h1>
    
        <div class=" flex justify-end p-6">
            <a href="{{ route('posts')}}" class=" right-0 flex items-center
            text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-5 py-2.5 text-center 
            mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">
                Tillbaka
            </a> 
        </div>
        
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col ">
                    <div class="container">
    
                        <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
    
                            <div class="flex flex-col gap-5">
    
                                <div>
    
                                    <label>Title:</label>
                                    <input name="title" placeholder="Name" value="{{ $post->title }}" class="border" >
                                </div>
                                
                                <div>
                                    <label>Content:</label>
                                    <input name="content" placeholder="Name" value="{{ $post->content }}" class="border" >
                                </div>
    
                                <div>
                                    <label>excerpt:</label>
                                    <input name="excerpt" placeholder="Name" value="{{ $post->excerpt }}" class="border" >
                                </div>

                                <div>
                                    <label>New File:</label>
                                    <input name="file_path_attachment" type="file" placeholder="Name" value="{{ $post->file_path_attachment }}" class="border" >
                                </div>

                                <div>
                                    <label>Category:</label>
                                    <select name="category_id" class="border">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                  <div>
                                    <label>Public:</label>
                                    <select name="is_public" class="border">
                                        <option value="1" {{ $post->is_public == 1 ? 'selected' : '' }}>True</option>
                                        <option value="0" {{ $post->is_public == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                </div>
    
                                <input type="submit"  class="w-24 inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
                            </div>
                        </form>
                    
    </x-admin-layout>