<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Cart') }}
        </h2>
    </x-slot>
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-center mt-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
              <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                  <thead>
                    <tr class="h-12 uppercase">
                      <th class="hidden md:table-cell"></th>
                      <th class="text-left">Product</th>
                      <th class="lg:text-right text-left pl-5 lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="hidden lg:inline">Quantity</span>
                      </th>
                      <th class="hidden text-right md:table-cell">Unit price</th>
                      <th class="text-right">Total price</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $total = 0 ?>

                  @if(session('cart'))
                      @foreach(session('cart') as $id => $details)

                          <?php $total += $details['price'] * $details['quantity'] ?>
                          <tr>
                            <td class="hidden pb-4 md:table-cell">
                              <a href="{{url("/home")}}">
                                <img src="{{asset("/storage/photos")}}/{{$details['img']}}" class="w-20 rounded" alt="">
                              </a>
                            </td>
                            <td data-th="">
                              <p class="mb-2 md:ml-4">{{$details['title']}}</p>
                              <button class="text-gray-700 md:ml-4 remove-from-cart" data-id="{{ $id }}">
                                <small>(Remove item)</small>
                              </button>
                            </td>
                            <td class="justify-center md:justify-end md:flex mt-6" data-th="Quantity">
                              <div class="w-20 h-10">
                                <div class="relative flex flex-row w-full h-8">
                                <input type="number" min="1" value="{{ $details['quantity'] }}" 
                                  class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black quantity update-cart" />
                                </div>
                              </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                              <span class="text-sm lg:text-base font-medium">
                                {{ $details['price'] }}
                              </span>
                            </td>
                            <td class="text-right">
                              <span class="text-sm lg:text-base font-medium">
                                {{ $details['price'] * $details['quantity'] }}
                              </span>
                            </td>
                          </tr> 
                      @endforeach
                  @endif
                  </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 -mx-2 lg:flex">
                  <div class="lg:px-2 lg:w-1/2">
                    <div class="p-4 bg-gray-100 rounded-full">
                      <h1 class="ml-2 font-bold uppercase">Instruction for seller</h1>
                    </div>
                    <div class="p-4">
                      <p class="mb-4 italic">If you have some information for the seller you can leave them in the box below</p>
                      <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
                    </div>
                  </div>
                  <div class="lg:px-2 lg:w-1/2">
                    <div class="p-4 bg-gray-100 rounded-full">
                      <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                    </div>
                    <div class="p-4">
                      <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you have entered</p>
                          <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                              Total
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                              {{ $total }}
                            </div>
                          </div>
                        <a href="{{ url('/payment') }}">
                          <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                            <span class="ml-2 mt-5px">Procceed to checkout</span>
                          </button>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <script>
        $(".update-cart").click(function (e) {
            e.preventDefault();
        
            var ele = $(this);
        
             $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
             });
         });
        
         $(".remove-from-cart").click(function (e) {
             e.preventDefault();
        
             var ele = $(this);
        
                 $.ajax({
                     url: '{{ url('remove-from-cart') }}',
                     method: "DELETE",
                     data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                     success: function (response) {
                         window.location.reload();
                     }
                 });
         });
    </script>
</x-app-layout>
    