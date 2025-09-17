<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductionResource;
use App\Models\Order;
use App\Models\OrderDetail;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductionResource::collection($products);
    }

    public function store(Request $request)
    {
        $form = (object)$request->input('form');
        $user = (object)$request->input('user');
        $items = (object)$request->input('items');
        $totalProductSum = $request->input('totalProductSum');
        $totalPrice =$request->input('totalPrice');
       
        $fullName = $form->fullName;
        $detailedAddress = $form->detailedAddress;
        $phoneNumber = $form->phoneNumber;
        $userId = $user->id;
        $data_order = [
            'userId' => $userId,
            'fullName' => $fullName,
            'detailedAddress' => $detailedAddress,
            'totalPrice' => $totalPrice,
            'totalProductSum' => $totalProductSum,
            'phoneNumber' => $phoneNumber,
        ];
      
        $order = Order::create([
            'userId' => $userId,
            'fullName' => $fullName,
            'detailedAddress' => $detailedAddress,
            'totalPrice' => $totalPrice,
            'totalProductSum' => $totalProductSum,
            'phoneNumber' => $phoneNumber,
        ]);

        $latest = Order::latest()->first();
        $orderId = $latest->id;
        foreach($items as $item){
            OrderDetail::create([
                'orderId' => $orderId,
                'productId' => $item['id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'imageURL' => $item['imageURL'],
                'sum' => $item['sum'],
                'title' => $item['title'],
            ]);
        }
        return response()->json(['message' => 'Order saved successfully', 'orderId' => $orderId], 201);

    }
}
