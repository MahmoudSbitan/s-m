<x-app-layout>
@can('isAdmin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('User Panel') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                {{-- <table class="table-fixed">
                    <thead>
                      <tr>
                        <th class="w-1/2">Name</th>
                        <th class="w-1/4">Email</th>
                        <th class="w-1/4">User Type</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                            <td>{{$user->user_type}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-1/6 p-2">
                                #
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
                        @php
                            $i=1;
                        @endphp
                        @foreach ($users as $user)
                            <div class="table-row text-center">
                                <div class="table-cell p-2">{{$i++}}</div>
                                <div class="table-cell p-2"><a class="hover:text-blue-600" href="{{url("admin/$user->id")}}">{{$user->name}}</a></div>
                                <div class="table-cell p-2"><a href="mailto:{{$user->email}}" class="hover:text-blue-600">{{$user->email}}</a></div>
                                <div class="table-cell p-2">
                                    {{-- {{$user->user_type}} --}}
                                    {!! Form::open(['action' => ['App\Http\Controllers\AdminController@update', $user->id], 'method' => 'PUT', 'class' => 'grid grid-col-2']) !!}
                                        <div>
                                            <select name="user_type" class="focus:ring-blue-100 focus:ring-4 rounded">
                                                @if ($user->user_type == 'admin')
                                                    <option>admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="user">User</option>
                                                    <option value="block">block</option>
                                                @elseif($user->user_type == 'employee'){
                                                    <option>employee</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="user">User</option>
                                                    <option value="block">block</option>
                                                }@elseif($user->user_type == 'seller'){
                                                    <option>seller</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="user">User</option>
                                                    <option value="block">block</option>
                                                }@elseif($user->user_type == 'user'){
                                                    <option>user</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="block">block</option>
                                                }@else{
                                                    <option>block</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="user">User</option>
                                                }                                                
                                                @endif
                                            </select>
                                        </div>
                                        <div>
                                            <button type="submit" class="bg-blue-500 text-white mt-2 px-9 py-2 rounded hover:bg-blue-600">Change</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
</x-app-layout>
