<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>
    <h3 class="p-4 text-2xl font-extrabold text-gray-700">Create a new Tag</h3>
    <div class=" flex justify-end p-6">
        <a href="{{ route('tags')}}" class=" right-0 flex items-center
        text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center 
        mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Back
        </a> 
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('tags.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                              <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Name
                              </label>
                              <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name">
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="excerpt">
                                  Slug
                                </label>
                                <input name="slug" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="slug">
                            </div>

                

                            <div class="flex items-center justify-between">
                              <input type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            </div>
                            
                          </form>


</x-admin-layout>
