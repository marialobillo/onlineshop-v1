 @extends('layouts.app')

 @section('content')

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

{{--                @dd(\DB::getQueryLog())--}}
             </div>
         @endempty


     </div>
 @endsection
