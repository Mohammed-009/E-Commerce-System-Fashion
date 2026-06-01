<?php

namespace App\Http\Controllers;

use App\Models\Women_lifestyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WomenLifestyleController extends Controller
{
    //
    //create women lifestyle product
    public function createNewWomenLifestyle()
    {
        return view('products5.women_lifestyle');
    }

    //show all women lifestyles products
    public function showWomenLifestyle()
    {
        $women_lifestyles= Women_lifestyle::all();
        return view('products5.show_womenLifestyle')->with('women_lifestyles', $women_lifestyles);
    }

    //edit women lifestyle
    public function editWomenLifestyle($id)
    {
        $women_lifestyle= Women_lifestyle::find($id);
        return view('products5.edit_LifestyleWomen')->with('women_lifestyle', $women_lifestyle);
    }

    //strore women lifestyle
    public function storeWomenLifestyle(Request $request)
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
            $path= $request->file('productImage')->storeAs('public/women_lifestyles_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $women_lifestyle= new Women_lifestyle();
        $women_lifestyle->user_id= auth()->user()->id;
        $women_lifestyle->categoryName= $request->input('categoryName');
        $women_lifestyle->productName= $request->input('productName');
        $women_lifestyle->productImage= $fileNameToStore;
        $women_lifestyle->productPrice= $request->input('productPrice');
        $women_lifestyle->productSize= $request->input('productSize');
        $women_lifestyle->productDescription= $request->input('productDescription');
        $women_lifestyle->save();
        return redirect()->back()->with('success', 'product added successfully');

    }

    //update women lifestyle
    public function updateWomenLifestyle(Request $request, $id)
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
            $path= $request->file('productImage')->storeAs('public/women_lifestyles_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $women_lifestyle= Women_lifestyle::find($id);
        $women_lifestyle->categoryName= $request->input('categoryName');
        $women_lifestyle->productName= $request->input('productName');
        $women_lifestyle->productImage= $fileNameToStore;
        $women_lifestyle->productPrice= $request->input('productPrice');
        $women_lifestyle->productSize= $request->input('productSize');
        $women_lifestyle->productDescription= $request->input('productDescription');
        $women_lifestyle->save();
        return redirect()->route('showWomenLifestyle')->with('success', 'product updated successfully');
    }

    //delete women lifestyle
    public function deleteWomenLifestyleProduct($id)
    {
        $women_lifestyle= Women_lifestyle::find($id);
        if($women_lifestyle->productImage != 'noimage.jpg')
        {
            Storage::delete('/public/women_lifestyles_images'. $women_lifestyle->productImage);
        }
        $women_lifestyle->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
