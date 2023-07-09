<x-admin-layout>
    <div class="flex justify-end p-6">
        <a href="/suppliers" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">
            Tillbaka
        </a> 
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-row gap-3 ">
                    <div class="container">
                        <div class="grid grid-cols-4">
                        {{--     @foreach($products as $product)
                                <a href="#" class="bg-gray-100 overflow-hidden shadow-sm w-48 m-3 flex justify-center flex-col gap-2">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="128" class="flex place-self-center">
                                    <h2 class="place-self-center">{{ $product->name }}</h2>
                                </a>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>