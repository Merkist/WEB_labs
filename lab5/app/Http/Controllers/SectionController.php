<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\Order;

class SectionController extends Controller
{
    public function get_section($name) {
        $s = new Section($name);
        return view('shop', ['obj' => $s]);
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
