<x-admin-layout>

  
      <div class="w-full h-screen bg-gray-100">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
              <div class="mb-4">
                <h1 class="text-3xl font-bolder leading-tight text-gray-900">Tags</h1>
              </div>
              <div class="-mb-2 py-4 flex flex-wrap flex-grow justify-between">
                <div class="flex items-center py-2">
                  <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-searcg" type="text" placeholder="Search">
                </div>
                <div class="flex items-center py-2">
                  <a href="{{ route('tags.create')}}"
                     class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
                    New Tag
                  </a>
                </div>
              </div>
              <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block w-full shadow overflow-x-auto sm:rounded-lg border-b border-gray-200">
                  <table class="min-w-full">
                    <!-- HEAD start -->
                    <thead>
                
                      <tr class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-medium">
                          <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" type="checkbox" />
                        </th>
                        <th class="px-6 py-3 text-left font-medium">
                          Name
                        </th>
                        <th class="px-6 py-3 text-left font-medium">
                          Slug
                        </th>
                        <th class="px-6 py-3 text-left font-medium">
                          Created
                        </th>
                        <th class="px-6 py-3 text-left font-medium">
                        </th>
                      </tr>
                    </thead>
                    <!-- HEAD end -->
                    <!-- BODY start -->
                    @foreach ($tags as $tag)
           
  
                    <tbody class="bg-white">
                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" type="checkbox" />
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="text-sm leading-5 text-gray-900">
                              {{$tag->name}}
                          </div>
                        </td>
                  
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="text-sm leading-5 text-gray-900">
                              {{ $tag->slug }}
                          </div>
                        </td>
                
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                          {{$tag->created_at}}
                        </td>
                        <td class="px-6 py-4 flex whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                   
                            <a href="tags/{{$tag->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>  
                            </a>

               
                            <form class="d-inline-block" method="POST" action="{{ route('tags.destroy', ['tag' => $tag]) }}">
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
        
                 
                    </tbody>
                    <!-- BODY end -->
             
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
    
     
    
    
        
    </x-admin-layout>