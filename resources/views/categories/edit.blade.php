
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategorier') }}
        </h2>
    </x-slot>
    <h1 class="p-4 text-4xl font-extrabold text-gray-700">Redigera</h1>



        <div class=" flex justify-end p-6">
            <a href="{{ route('categories')}}" class=" right-0 flex items-center
            text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-5 py-2.5 text-center 
            mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">
                Tillbaka
            </a> 
        </div>
        

    {{-- Here we want to show the current categories (a card) --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col ">
                    <div class="container">
                    
                        <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST">
                            @csrf
                            @method('PUT')
                        
                 {{--            <x-form.field>
                                <x-form.input name="name" placeholder="Name" value="{{ $category->name }}" required />
                            </x-form.field>
                        
                            <h1>Subcategories</h1>
                            @foreach($subcategories as $subcategory)
                                <x-form.field>
                                    <x-form.input name="subcategories[{{ $subcategory->id }}]" placeholder="Subcategory Name" value="{{ $subcategory->name }}" required />
                                </x-form.field>
                            @endforeach
                        
                            <x-form.button>Update</x-form.button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   


      
</x-admin-layout>