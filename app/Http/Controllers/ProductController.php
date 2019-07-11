<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $products->map(function ($product){
           return new ProductResource($product);
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Input::all();
        $product = Product::create($data);

        $product->available = $data['available'];
        $product->save();

        return new Response($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) return new Response([
            'result' => 'fail',
            'message' => 'product not found'
        ]);

        $data = Input::all();

        foreach ($data as $key => $value) {
            if ($key === 'price') {
                $product->$key = $value*100;
            } else {
                $product->$key = $value;
            }
        }
        $product->save();
        return new Response(new ProductResource($product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Product::destroy($id);
//        Product::find([1,2,3])->delete();

        return ['result' => $result ? 'success' : 'fail'];
    }

    public function deleteBySeller($sellerId){
        $result = Product::where('seller_id', $sellerId)->delete();
        return ['result' => $result ? 'success' : 'fail'];
    }
}
