<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Arr;
use JD\Cloudder\Facades\Cloudder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('admin.product.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'name' => 'required|max:50|unique:categories',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            // 'duration' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|numeric',
        ]);

        $dataRecord = $request->all();



        if (!is_null($request->file('file'))) {
            $image_name = $request->file('file')->getRealPath();;
            Cloudder::upload($image_name, null);
            $file = Cloudder::getResult();
            $dataRecord['image'] =  $file['secure_url'];
        }

        Product::create($dataRecord);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::where('id', $id)->first();

        return view('admin.product.update')->with('data', $data);
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
        $product = Product::findOrFail($id);
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:50|unique:categories',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            // 'duration' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|numeric',
            // 'stock' => 'required|numeric',
        ]);
        $dataRecord = $request->all();

        if (!is_null($request->file('file'))) {
            $file = $request->file('file');
            $file_name = strtotime(date("Y-m-d h:i:s")) . '.' .  $file->getClientOriginalExtension();
            $file->move('Product', $file_name);
            $dataRecord['image'] =  'Product/' . $file_name;
        }

        $product->update($dataRecord);

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Product::find($id)->delete();
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect(route('product.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        return $request->all();
    }
}
