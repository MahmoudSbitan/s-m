<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                <div class="mb-5">
                    <a href="{{url('/panels/categoryPanel')}}" class="p-3 bg-indigo-300 text-white rounded">{{ __('Back') }}</a>
                </div>

                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-1/6 p-2">
                                #
                            </div>
                            <div class="table-cell bg-gray-200 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Icon
                            </div>
                            <div class="table-cell bg-gray-300 w-1/6 p-2 border-2 border-gray-50 border-dashed">
                                Title
                            </div>
                            <div class="table-cell bg-gray-400 w-1/6 p-2 border-2 border-gray-50 border-dashed">
                                Status
                            </div>
                            <div class="table-cell bg-gray-400 w-1/6 p-2 border-2 border-gray-50 border-dashed">
                                category Id
                            </div>
                        </div>
                        @php
                            $i=1;
                        @endphp
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <div class="table-row text-center">
                                    <div class="table-cell p-2">{{$i++}}</div>
                                    <div class="table-cell p-2"><img src="{{asset("/storage/images/$category->img")}}" alt="" width="100px"></div>
                                    <div class="table-cell p-2">{{$category->title}}</div>
                                    <div class="table-cell p-2">
                                        {!! Form::open(['action' => ['App\Http\Controllers\CategoryController@update', $category->id], 'method' => 'PUT', 'class' => 'grid grid-col-2']) !!}
                                            <div>
                                                <select name="status" class="focus:ring-blue-100 focus:ring-4 rounded">
                                                    @if ($category->status == 'active')
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
                                    <hr>
                                </div>
                            @endforeach
                        @else
                            <p class="p-2">No categories yet 💔</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col ">
                <div class="bg-white shadow-md rounded-3xl p-5">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto">Shop Info</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <div class="form">
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2">Company Logo<abbr class="hidden" title="required">*</abbr></label>
                                <div class="flex items-center py-6">
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover" src="" alt="Avatar Upload">
                                    </div>
                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                    <input type="file" class="hidden" :multiple="multiple" :accept="accept">
                                    </label>
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2">Company  Name <abbr title="required">*</abbr></label>
                                    <input placeholder="Company Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2">Company  Mail <abbr title="required">*</abbr></label>
                                    <input placeholder="Email ID" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                </div>
                            </div>
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class=" font-semibold text-gray-600 py-2">Company  Website</label>
                                <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                    <div class="flex">
                                        <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        </span>
                                    </div>
                                    <input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="https://">
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Company Address</label>
                                    <input placeholder="Address" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="integration[street_address]" id="integration_street_address">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Location<abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" name="integration[city_id]" id="integration_city_id">
                                        <option value="">Seleted location</option>
                                        <option value="">Cochin,KL</option>
                                        <option value="">Mumbai,MH</option>
                                        <option value="">Bangalore,KA</option>
                                    </select>
                                    <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                                </div>
                            </div>
                            <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                <label class="font-semibold text-gray-600 py-2">Description</label>
                                <textarea required="" name="message" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter your comapny info" spellcheck="false"></textarea>
                                <p class="text-xs text-gray-400 text-left my-3">You inserted 0 characters</p>
                            </div>
                            <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                                asterisk <abbr title="Required field">*</abbr>
                            </p>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"> Cancel </button>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
