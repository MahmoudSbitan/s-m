<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Items Panel') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-auto p-2">
                                #
                            </div>
                            <div class="table-cell bg-gray-200 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Icon
                            </div>
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Title
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Status
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Category Id
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                User Id
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Employee Id
                            </div>
                        </div>
                        @php
                            $i=1;
                        @endphp
                        @if (count($items) > 0)
                            @foreach ($items as $item)
                                <div class="table-row text-center">
                                    <div class="table-cell p-2">{{$i++}}</div>
                                    <div class="table-cell p-2"><img src="{{asset("/storage/photos/$item->img")}}" alt="" width="100px"></div>
                                    <div class="table-cell p-2">{{$item->title}}</div>
                                    <div class="table-cell p-2">
                                        {!! Form::open(['action' => ['App\Http\Controllers\ItemController@update', $item->id], 'method' => 'PUT', 'class' => 'grid grid-col-2']) !!}
                                            <div>
                                                <select name="status" class="focus:ring-blue-100 focus:ring-4 rounded">
                                                    @if ($item->status == 'active')
                                                        <option>Active</option>
                                                        <option value="deactivate">Deactivate</option>
                                                    @else{
                                                        <option>Deactivate</option>
                                                        <option value="active">active</option>
                                                    }                        
                                                    @endif
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="bg-blue-500 text-white mt-2 px-9 py-2 rounded hover:bg-blue-600">{{ __('Change') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-cell p-2">{{$item->category_id}}</div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="{{url("admin/$item->user_id")}}">{{$item->user_id}}</a></div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="{{url("admin/$item->employee_id")}}">{{$item->employee_id}}</a></div>
                                </div>
                            @endforeach
                        @else
                            <p class="p-2">No items yet 💔</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
