<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Women_Shoe;
use Illuminate\Support\Facades\Storage;

class WomenShoesController extends Controller
{
    //
    public function createWomenShoes()
    {
        return view('product8.create');
    }

    public function showWomenShoes()
    {
        $women_shoes= Women_Shoe::all();
        return view('product8.show')->with('women_shoes', $women_shoes);
    }

    public function storeWomenShoes(Request $request)
    {
        $request->validate([
            'categoryName'=>'required',
            'productName'=>'required',
            'productImage'=>'image|nullable|max:1999',
            'productDescription'=>'required',
            'productPrice'=>'required',
            'productSize'=>'required'
        ]);

        if($request->hasFile('productImage')) {
            //Get filename with extension
            $filenameWithExt= $request->file('productImage')->getClientOriginalName();
            //Get just filename
            $filename= pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('productImage')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path= $request->file('productImage')->storeAs('public/women_shoes_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $women_shoes= new Women_Shoe();
        $women_shoes->user_id= auth()->user()->id;
        $women_shoes->categoryName= $request->input('categoryName');
        $women_shoes->productName= $request->input('productName');
        $women_shoes->productImage= $fileNameToStore;
        $women_shoes->productPrice= $request->input('productPrice');
        $women_shoes->productSize= $request->input('productSize');
        $women_shoes->productDescription= $request->input('productDescription');
        $women_shoes->save();
        return redirect()->back()->with('success', 'product added successfully');
    }

    public function editWomenShoes($id)
    {
        $women_shoes= Women_Shoe::find($id);
        return view('product8.edit')->with('women_shoes', $women_shoes);
    }

    public function updateWomenShoes(Request $request, $id)
    {
        $request->validate([
            'categoryName'=>'required',
            'productName'=>'required',
            'productImage'=>'image|nullable|max:1999',
            'productDescription'=>'required',
            'productPrice'=>'required',
            'productSize'=>'required'
        ]);

        if($request->hasFile('productImage')) {
            //Get filename with extension
            $filenameWithExt= $request->file('productImage')->getClientOriginalName();
            //Get just filename
            $filename= pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('productImage')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path= $request->file('productImage')->storeAs('public/women_shoes_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

            $women_shoes= Women_Shoe::find($id);
            $women_shoes->categoryName= $request->input('categoryName');
            $women_shoes->productName= $request->input('productName');
            $women_shoes->productImage= $fileNameToStore;
            $women_shoes->productPrice= $request->input('productPrice');
            $women_shoes->productSize= $request->input('productSize');
            $women_shoes->productDescription= $request->input('productDescription');
            $women_shoes->save();
            return redirect()->route('showWomenShoes')->with('success', 'product updated successfully');

    }

    public function deleteWomenShoes($id)
    {
        $women_shoes= Women_Shoe::find($id);
        if($women_shoes->productImage != 'noimage.jpg')
        {
            Storage::delete('/storage/women_shoes_images/'. $women_shoes->productImage);
        }
        $women_shoes->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
