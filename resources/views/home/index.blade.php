<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script>
    var cont=0;
function loopSlider(){
  var xx= setInterval(function(){
        switch(cont)
        {
        case 0:{
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-indigo-800");
            $("#sButton2").addClass("bg-indigo-800");
        cont=1;
        
        break;
        }
        case 1:
        {
        
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-indigo-800");
            $("#sButton1").addClass("bg-indigo-800");
           
        cont=0;
        
        break;
        }
        
        
        }},8000);

}

function reinitLoop(time){
clearInterval(xx);
setTimeout(loopSlider(),time);
}



function sliderButton1(){

    $("#slider-2").fadeOut(400);
    $("#slider-1").delay(400).fadeIn(400);
    $("#sButton2").removeClass("bg-indigo-800");
    $("#sButton1").addClass("bg-indigo-800");
    reinitLoop(4000);
    cont=0
    
    }
    
    function sliderButton2(){
    $("#slider-1").fadeOut(400);
    $("#slider-2").delay(400).fadeIn(400);
    $("#sButton1").removeClass("bg-indigo-800");
    $("#sButton2").addClass("bg-indigo-800");
    reinitLoop(4000);
    cont=1
    
    }

    $(window).ready(function(){
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-indigo-800");
        

        loopSlider();
     
        
    
    
    
    
    });

  
  </script>

<script>
  $(document).ready(function(){
    $("#blogSearch").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".py-12 .bg-white").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
    <div class="sliderAx h-auto">
      <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(http://graduation.lar/images/background1.png)">
       <div class="md:w-1/2">
        <p class="font-bold text-sm uppercase">Online Store</p>
        <p class="text-3xl font-bold">S&M</p>
        <p class="text-2xl mb-10 leading-none">Buy whatever you want</p>
        <a href="#" class="bg-indigo-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Shop Now</a>
        </div>  
    </div> <!-- container -->
      <br>
      </div>

      <div id="slider-2" class="container mx-auto">
        <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(http://graduation.lar/images/background2.png)">
       
  <p class="font-bold text-sm uppercase">Online Store</p>
        <p class="text-3xl font-bold">S&M</p>
        <p class="text-2xl mb-10 leading-none">Buy whatever you want</p>
        <a href="#" class="bg-indigo-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Shop Now</a>
         
    </div> <!-- container -->
      <br>
      </div>
    </div>
 <div class="flex justify-between w-12 mx-auto pb-2">
        <button id="sButton1" onclick="sliderButton1()" class="bg-indigo-400 rounded-full w-4 pb-2 " ></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-indigo-400 rounded-full w-4 p-2"></button>
  </div>


    <div class="flex items-center justify-center w-full mt-5">
      <form method="GET">
        <div class="relative text-gray-600 focus-within:text-gray-400">
          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
          </span>
          <input id="blogSearch" type="search" name="q" class="py-2 text-sm bg-gray-200 text-gray-500 dark:text-white dark:bg-gray-900 rounded-lg pl-10 focus:outline-none focus:bg-gray-800" placeholder="Search..." autocomplete="off">
        </div>
      </form>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-4 xs-grid-col-2">
          @foreach ($items as $item)
          <div class="bg-white max-h-1/2 w-full rounded-2xl hover:shadow dark:bg-gray-900">
            <a href="{{url("/home/$item->id")}}">
              <img class="mx-auto w-30 max-h-80" src="{{asset("/storage/photos/$item->img")}}" alt="">
              <div class="mt-2 text-gray-900 p-2 dark:text-white">
                <h2 class="text-xl font-semibold tracking-tight">{{$item->title}}</h2>
                <h4 class="mt-1 flex justify-between items-center">
                  @if ($item->discount > 0)
                  <span class="text-gray-700">
                    <span class="font-bold text-base">$</span>
                    <span class="font-semibold text-xl tracking-tight dark:text-gray-200">{{$item->price - $item->price * ($item->discount / 100)}}</span>
                    <small></small>
                    <p class="line-through dark:text-gray-200">{{$item->price}} $</p>
                  </span>
                  <span class="flex items-center mr-1">
                    <div class="bg-red-700 rounded-lg p-2 mr-1 text-white">{{$item->discount}}%</div>
                  </span>
                  @else
                  <span class="text-gray-700">
                    <span class="font-bold text-base">$</span>
                    <span class="font-semibold text-xl tracking-tight dark:text-gray-200">{{$item->price}}</span>
                    <p></p>
                  </span>
                  @endif
                  
                </h4>
                <div class="text-center mt-7">
                  <a class="bg-black text-gray-50 px-3 py-2 rounded-2xl hover:bg-gray-400" href="{{ url('add-to-cart/'.$item->id) }}">
                    Add To Cart
                  </a>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
    </div>
</x-app-layout>
