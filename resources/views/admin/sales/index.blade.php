<x-app-layout>
@can('isAdmin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Sales Panel') }}
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
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed">
                                status
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                date
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                User Id
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Item Id
                            </div>
                        </div>
                        @php
                            $i=1;
                        @endphp
                        @if (count($sales) > 0)
                            @foreach ($sales as $sale)
                                <div class="table-row text-center">
                                    <div class="table-cell p-2">{{$i++}}</div>
                                    <div class="table-cell p-2">{{$sale->status}}</div>
                                    <div class="table-cell p-2">{{$sale->time_stamp}}</div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="{{url("admin/$sale->user_id")}}">{{$sale->user_id}}</a></div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="{{url("item/$sale->item_id")}}">{{$sale->item_id}}</a></div>
                                </div>
                            @endforeach
                        @else
                            <p class="p-2">No sales yet 💔</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
</x-app-layout>
