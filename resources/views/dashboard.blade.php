<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
       <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate" align="center">
     Welcome {{session('user')}}
    </h2>
        @if(session()->has('status'))
             <h2 class="text-2xl font-bold leading-7 text-red-900 sm:text-3xl sm:truncate" align="center">
            {{session('status')}}
            </h2>
        @endif
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table align="center" class="mt-5 divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black-500 uppercase tracking-wider">
                Post Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-large text-black-500 uppercase tracking-wider">
                Post
              </th>
           
              <th scope="col" colspan='2' class="px-6 py-3 text-left text-xs font-large text-black-500 uppercase tracking-wider">
                Operations
              </th>
              
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
           @foreach($post as $p)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$p->title}}
                    </div>
                    
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$p->body}}</div>
                
              </td>
             
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="/edit/{{$p->id}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="/delete/{{$p->id}}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
              </td>
            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
        {{$post->links()}}
      </div>
    </div>
  </div>
</div>
  

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
