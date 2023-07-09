<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategorier') }}
        </h2>
    </x-slot>
    <h1 class="p-4 text-4xl font-extrabold text-gray-700">Kategorier</h1>



        <div class=" flex justify-end p-6">
            <a href="{{ route('categories.create')}}" class=" right-0 flex items-center
            text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-5 py-2.5 text-center 
            mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">
                Lägg till ny Kategori
            </a> 
        </div>
        

    {{-- Here we want to show the current categories (a card) --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col ">
    
                    <table class="table-fixed">
                        <thead>
                            <tr class="">
                                <th class="text-left w-1/2">Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr >
                                    <td class="py-4 w-1/2">{{$category->name}}</td>
                                    <td class="flex gap-4 justify-end">
                                        <a href="categories/{{$category->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>  
                                        </a>

                           
                                        <form class="d-inline-block" method="POST" action="{{ route('categories.destroy', ['category' => $category]) }}">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger confirm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                          </button>
                                        </form>
                           
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   


      
</x-admin-layout>