@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="bg-red-300 text-red-700 pt-2 pb-2 pr-4 pl-4 rounded">
            {{$error}}
        </div>    
    @endforeach
@endif

@if(session('success'))
    <div class="bg-green-300 text-green-700 pt-2 pb-2 pr-4 pl-4 rounded">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-300 text-red-700 pt-2 pb-2 pr-4 pl-4 rounded">
        {{session('error')}}
    </div>
@endif

