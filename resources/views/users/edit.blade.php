
<x-admin-layout>
   

    <h1 class="p-4 text-4xl font-extrabold text-gray-700">Edit</h1>
    
        <div class=" flex justify-end p-6">
            <a href="{{ route('users')}}" class=" right-0 flex items-center
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
    
                        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
    
                            <div class="flex flex-col gap-5">
    
                                <div>
    
                                    <label>Name:</label>
                                    <input name="name" placeholder="Name" value="{{ $user->name }}" class="border" >
                                </div>
                                
                                <div>
                                    <label>Email:</label>
                                    <input name="email" placeholder="Name" value="{{ $user->email }}" class="border" >
                                </div>
    
                                <div>
                                    <label>Role:</label>
                                    <select name="is_role" id="is_role" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                                        <option value="standard_user" {{ $user->is_role == 'standard_user' ? 'selected' : '' }}>Standard User</option>
                                        <option value="admin" {{ $user->is_role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="super_admin" {{ $user->is_role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                        <!-- Add more role options as needed -->
                                    </select>
                                </div>
    
                                <input type="submit"  class="w-24 inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
                            </div>
                        </form>
                    
    </x-admin-layout>