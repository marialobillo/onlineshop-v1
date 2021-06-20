<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;
use App\Models\Cart;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory(15)
            ->create()
            ->each(function($user){
                $image = Image::factory()
                    ->user()
                    ->make();

                $user->image()->save($image);
            });

        $orders = Order::factory(10)
            ->make()
            ->each(function($order) use ($users){
                $order->customer_id = $users->random()->id;
                $order->save();

                $payment = Payment::factory()->make();
//                $payment->order_id = $order->id;
//                $payment->save();

                $order->payment()->save($payment);
            });

        $carts = Cart::factory(20)->create();

        $products = Product::factory(40)
            ->create()
            ->each(function($product) use ($orders, $carts){

                $order = $orders->random();
                $order->products()->attach([
                    $product->id => ['quantity' => random_int(1, 3)]
                ]);

                $cart = $carts->random();
                $cart->products()->attach([
                    $product->id => ['quantity' => random_int(1, 3)]
                ]);

                $images = Image::factory(random_int(2, 4))->make();
                $product->images()->saveMany($images);
            });

    }
}
