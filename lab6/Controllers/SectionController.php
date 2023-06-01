<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\Order;
use App\Models\Product;
use App\Models\Ingredient;

class SectionController extends Controller
{


    //public function get_section($name) {
    //    $name = htmlspecialchars($name);
    //    $s = new Section($name);
    //    return view('shop', ['obj' => $s]);
    //}



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
        return view('cart');
    }

    public function send_cart(Request $request) {
        $o = new Order($request->city, $request->street, $request->house_n, $request->entrance_n, $request->apartment_n);

        $data = [get_object_vars($o)];
        $inp = file_get_contents('assets\orders_data.json');
        $tempArray = json_decode($inp);
        if (empty($tempArray)){
            $tempArray = $data;
        }
        else{
            array_push($tempArray, $data);
        }
        $jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
        file_put_contents('assets\orders_data.json', $jsonData);

        //$jsonString = json_encode($o->expose(), JSON_PRETTY_PRINT);
        //$fp = fopen('data.json', 'w');
        //fwrite($fp, $jsonString);
        //fclose($fp);
        return view('cart');
    }
}
