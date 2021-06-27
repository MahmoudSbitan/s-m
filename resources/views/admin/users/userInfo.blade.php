<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('User Panel') }} - {{$user->name}} 
        </h2>
    </x-slot>
@can('isAdmin')
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-1/6 p-2">
                                ID
                            </div>
                            <div class="table-cell bg-gray-200 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Name
                            </div>
                            <div class="table-cell bg-gray-300 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Email
                            </div>
                            <div class="table-cell bg-gray-400 w-1/6 p-2 border-2 border-gray-50 border-dashed">
                                User Type
                            </div>
                        </div>

                        <div class="table-row text-center">
                            <div class="table-cell p-2">{{$user->id}}</div>
                            <div class="table-cell p-2">{{$user->name}}</div>
                            <div class="table-cell p-2"><a href="mailto:{{$user->email}}" class="hover:text-blue-600">{{$user->email}}</a></div>
                        </div>
                        @php
                            $i=1;
                        @endphp
                        @if ($user->user_type == 'admin')
                            <p>Admin</p>
                        @elseif($user->user_type == 'employee'){
                            {{-- @foreach ($items as $item)
                                
                            @endforeach --}}
                        }@elseif($user->user_type == 'seller'){
                            {{-- @foreach ($items as $item)
                                
                            @endforeach --}}
                        }@elseif($user->user_type == 'user'){
                            {{-- @foreach ($items as $item)
                                
                            @endforeach --}}
                        }@else{
                            <div class="bg-red-200 text-red-600 rounded p-2">
                                <p>Blocked</p>
                            </div>
                            {{-- @foreach ($items as $item)
                                
                            @endforeach --}}
                        }                                                
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
</x-app-layout>
