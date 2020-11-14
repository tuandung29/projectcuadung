<?php

namespace App\Http\Controllers;

use App\product;
use App\ProductType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::paginate(10);
        return view('page.showadmin', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ProductType::all();
        return view('page.AddPro',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        $request->validate([
            'prod_id' => 'required|integer',
            'prod_name' => 'required',
            'prod_id_type' => 'required',
            'prod_price' => 'required|integer',
            'prod_unit' => 'required',
            'prod_new' => 'required|integer',
            'prod_img' => 'required'
        ]);

        $products = new product();

        $products->id = $request->prod_id;
        $products->name = $request->prod_name;
        $products->id_type = $request->prod_id_type;
        $products->description = $request->prod_desc;
        $products->unit_price = $request->prod_price;
        $products->promotion_price = $request->prod_promo_price;
        $products->unit = $request->prod_unit;
        $products->new = $request->prod_new;


        if ($request->hasFile('prod_img')) {
            $file = $request->file('prod_img');
            $fileName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $file->move('source/image/product', $fileName);
            $products->image = $fileName;
        }
//        dd($request);

        $products->save();
        return redirect('/admin')->with('success', 'them thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit_pro = product::find($id);

        return view('page.EditPro', compact('edit_pro'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {

        //dd($request);
        $request->validate([
            'prod_id' => 'required|integer',
            'prod_name' => 'required',
            'prod_id_type' => 'required',
            'prod_price' => 'required|integer',
            'prod_unit' => 'required',
            'prod_new' => 'required|integer',
            'prod_img' => 'required'
        ]);

        $edit_pro = product::find($id);
        $edit_pro->id = $request->get('prod_id');
        $edit_pro->name = $request->get('prod_name');
        $edit_pro->id_type = $request->get('prod_id_type');
        $edit_pro->description = $request->get('prod_desc');
        $edit_pro->unit_price = $request->get('prod_price');
        $edit_pro->promotion_price = $request->get('prod_promo_price');
        $edit_pro->unit = $request->get('prod_unit');
        $edit_pro->new = $request->get('prod_new');
//        $edit_pro->image = $request->get('prod_img');

        if ($request->hasFile('prod_img')) {
            $file = $request->file('prod_img');
            $fileName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $file->move('source/image/product', $fileName);
            $edit_pro->image = $fileName;
        }
        $edit_pro->save();

        return redirect('/admin')->with('success', 'update thành công');


        /* $edit_pro->id = $request->prod_id;
         $edit_pro->name = $request->prod_name;
         $edit_pro->id_type = $request->prod_id_type;
         $edit_pro->description = $request->prod_desc;
         $edit_pro->unit_price = $request->prod_price;
         $edit_pro->promotion_price = $request->prod_promo_price;
         $edit_pro->unit = $request->prod_unit;
         $edit_pro->new = $request->prod_new;
         $edit_pro->image = $request->prod_img;*/


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = product::find($id);
        $products->delete();
        return redirect('/admin')->with('success', 'Xóa sản phẩm thành công!');
    }
}
