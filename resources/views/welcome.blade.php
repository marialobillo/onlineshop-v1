 @extends('layouts.app')

 @section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


        </div>

     <div class="container">
         <h1>Welcome</h1>

         @empty($products)
             <div class="alert alert-danger">
                 No products yet!
             </div>
         @else
             <div class="row">
                 @foreach($products as $product)
                     <div class="col-3">
                        @include('components.product-card')
                     </div>
                 @endforeach
             </div>
         @endempty

         <div class="row">

         </div>
     </div>
 @endsection
