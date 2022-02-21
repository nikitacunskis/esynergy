<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Flysystem\Config;

class ProductController extends Controller
{
    /**
     * @param Request $request
     */
    public function get(Request $request)
    {
        $data = json_decode($request->data);

        $products = DB::select("SELECT id,title,amount,price FROM products
                                        WHERE created_at BETWEEN ? AND ?
                                        LIMIT 10", [$data->start_date, $data->end_date]);
        foreach ($products as $productKey => $product)
        {
            $products[$productKey]->with_pvn = $product->amount * $product->price * (1+ env('PVN'));
        }

        echo json_encode($products);
    }
}
