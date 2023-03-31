<?php

namespace App\Http\Controllers;

use App\Models\Order as Order;
use App\Models\Product as Product;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OrderRequest;
use DB;
use Config\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = DB::table('orders')
                 ->select('orders.id', 'orders.quantity', 'orders.address', 'orders.is_delivered',
                 DB::raw("CONCAT(
                     '[',
                         GROUP_CONCAT(
                             JSON_OBJECT(
                                 'id', products.id,
                                 'name', products.name,
                                 'description', products.description,
                                 'units', products.units,
                                 'price', products.price,
                                 'image', products.image
                             )
                         ),
                     ']'
                     ) AS product"))
                 ->join('products', 'products.id', '=', 'orders.product_id')
                 ->groupBy('orders.id')
                 ->get();
 
         $data = json_decode($query);
         
         return response([
             'success' => true,
             'message' => 'List of All Orders',
             'data' => $data
         ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $data= $request->validated();

        //$user_id = Auth::id();

        $orders = Order::create($data);
        
        if ($orders) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Order Created!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => $data,
                'message' => 'Error Creating Orders!',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request)
    {
        $data= $request->validated();            
        
        $orders = Order::whereId($request->get('id'))->update([
            'product_id'    => $request->get('product_id'),
            'user_id'       => $request->get('user_id'),
            'quantity'      => $request->get('quantity'),
            'address'       => $request->get('address'),
        ]);
        
        if ($orders) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Orders Updated! ',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => $data,
                'message' => 'Error Updating Orders!',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orders = Order::findOrFail($id);

        $orders->delete();

        //$orders->product()->where('product_id', $id)->detach();
        
        if ($orders) {
            return response()->json([
                'success' => true,
                'message' => 'Order Deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error Deleting Order!',
            ], 500);
        }
    }
}
