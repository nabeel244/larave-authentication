<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $products = Product::orderby('id', 'desc')->get();
       return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required',         
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('picture/', $filename);
            $product->image = $filename;
        } else {
            return $request;
            $product->image = '';
        }
        if ($product->save()) {
            return back()->with('success', 'Product added Successfully');
        } else {
            return back()->with('success', 'Error in adding Product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    public function show()
    {
        return view('admin.product.add');
    }

   
    public function edit($id) {
    $product = Product::findOrFail($id);
    return view('admin.product.edit', compact('product'));
   
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',         
            'price' => 'required|integer',
        ]);
        $product =  Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        if($request->image == '' OR $request->image == null){
            $file =  $product->image;
           $product->image = $file;
            
        }else{
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $file->move('picture/', $filename);
                $product->image = $filename;
            } else {
                return $request;
                $product->image = '';
            }
        }
        
        if ($product->save()) {
            return back()->with('success', 'Product updated Successfully');
        } else {
            return back()->with('success', 'Error in updating Product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $del = Product::findOrFail($id);
        $del->delete();
        return back()->with('success', 'Product has been removed by admin');
    }
}
