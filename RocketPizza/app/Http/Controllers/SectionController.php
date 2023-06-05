<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Order;

class SectionController extends Controller
{
    public function get_pizza() {

        $pizzas = Product::where('type', 'pizza')->get();
        $data =[];

        foreach ($pizzas as $pizza) {
            array_push($data, ['pizza' => $pizza, 'ing' => $pizza->ingredients]);
        }

        return view("pizza", ['obj' => $data]);
    }

    public function get_pizza_f($ing_id) {

        $ing_id = htmlspecialchars($ing_id);

        $pizzas = Product::where('type', 'pizza')->get();
        $data =[];

        foreach ($pizzas as $pizza) {
            if(in_array($ing_id, $pizza->ingredients->pluck('id')->toArray())){
                array_push($data, ['pizza' => $pizza, 'ing' => $pizza->ingredients]);
            }
        }

        return view("pizza", ['obj' => $data]);
    }

    public function get_drink() {

        $drinks = Product::where('type', 'drink')->get();

        return view("drink", ['obj' => $drinks]);
    }

    public function get_snack() {

        $snacks = Product::where('type', 'snack')->get();

        return view("snack", ['obj' => $snacks]);
    }

    public function get_dessert() {

        $desserts = Product::where('type', 'dessert')->get();

        return view("dessert", ['obj' => $desserts]);
    }






    public function get_cart() { 
        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [];
        }

        $total_price = 0;
        foreach ($cart as $id => $value) {
            $total_price += (Product::find($id)->price * $cart[$id]["quantity"]);
        }

        return view('cart', ['obj' => $cart, 'total_price' => $total_price]);
    }

    public function add_to_cart($id) {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "img" => $product->img
                    ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "img" => $product->img
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function cart_item_plus($id) {
        $cart = session()->get('cart');
        if(!$cart || !isset($cart[$id])) {
            abort(404);
        }

        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product quantity increased successfully!');
    }

    public function cart_item_minus($id) {
        $cart = session()->get('cart');
        if(!$cart || !isset($cart[$id])) {
            abort(404);
        }


        if($cart[$id]['quantity'] == 1){
            return redirect()->back()->with('success');
        }
        $cart[$id]['quantity']--;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product quantity decreased successfully!');
    }

    public function cart_item_delete($id) {
        $cart = session()->get('cart');
        if(!$cart || !isset($cart[$id])) {
            abort(404);
        }
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product quantity decreased successfully!');
    }


    public function send_cart(Request $request) {

        $cart = session()->get('cart');

        if (empty($request->city) || empty($request->street) || empty($request->house_n) || empty($cart)){
            return redirect()->back()->with('success', 'Cart sent successfully!');
        }

        session()->put('cart', []);

        $o = new Order();
        $o->city = htmlspecialchars($request->city);
        $o->street = htmlspecialchars($request->street);
        $o->house_n = htmlspecialchars($request->house_n);
        $o->entrance_n = htmlspecialchars($request->entrance_n);
        $o->apartment_n = htmlspecialchars($request->apartment_n);

        $total_price = 0;
        foreach ($cart as $id => $value) {
            $total_price += (Product::find($id)->price * $cart[$id]["quantity"]);
        }
        $o->price = $total_price;
        
        $o->save();

        foreach ($cart as $id => $item) {
            $o->products()->attach($id, ['quantity' => $item["quantity"]]);
        }

        return redirect()->back()->with('success', 'Cart sent successfully!');
    }
}
