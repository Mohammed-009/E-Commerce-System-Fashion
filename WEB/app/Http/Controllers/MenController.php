<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Men_official;
use Illuminate\Support\Facades\Storage;

class MenController extends Controller
{
    //
    public function storeMenOfficial(Request $request)
    {
        $request->validate([
            'categoryName'=>'required',
            'productName'=>'required',
            'productImage'=>'image|nullable|max:1999',
            'productDescription'=>'required',
            'productPrice'=>'required',
            'productSize'=>'required'
            
        ]);
        // return $request->all();

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
            $path= $request->file('productImage')->storeAs('public/men_officials_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }


        $men_official= new Men_official();
        $men_official->user_id= auth()->user()->id;
        $men_official->categoryName= $request->input('categoryName');
        $men_official->productName= $request->input('productName');
        $men_official->productImage= $fileNameToStore;
        $men_official->productPrice= $request->input('productPrice');
        $men_official->productSize= $request->input('productSize');
        $men_official->productDescription= $request->input('productDescription');
        $men_official->save();
        return redirect()->back()->with('success', 'product added successfully');

    }

    // show page to create new product
    public function createNewMenOfficial()
    {
        return view('products1.men_official');
    }

    // fetch all products from the database
    public function showMenOfficial()
    {
        $men_officials= Men_official::all();
        return view('products1.show_men')->with('men_officials', $men_officials);
    }

    // edit product
    public function editMenProduct($id)
    {
        $men_official= Men_official::find($id);
        return view('products1.edit_men')->with('men_official', $men_official);
    }


    // update product
    public function updateMenProduct(Request $request, $id)
    {
        $request->validate([
            'categoryName'=>'required',
            'productName'=>'required',
            'productImage'=>'image|nullable|max:1999',
            'productDescription'=>'required',
            'productPrice'=>'required',
            'productSize'=>'required'
            
        ]);
        // return $request->all();

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
            $path= $request->file('productImage')->storeAs('public/men_officials_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }


        $men_official= Men_official::find($id);
        // $men_official->user_id= auth()->user()->id;
        $men_official->categoryName= $request->input('categoryName');
        $men_official->productName= $request->input('productName');
        $men_official->productImage= $fileNameToStore;
        $men_official->productPrice= $request->input('productPrice');
        $men_official->productSize= $request->input('productSize');
        $men_official->productDescription= $request->input('productDescription');
        $men_official->save();
        return redirect()->route('showMenOfficial')->with('success', 'product updated successfully');

    }


    // delete product
    public function deleteMenProduct($id)
    {
        $men_official= Men_official::find($id);
        if($men_official->productImage != 'noimage.jpg')
        {
            Storage::delete('/public/men_officials_images'. $men_official->productImage);

        }
        $men_official->delete();
        return redirect()->back()->with('success', 'product deleted successfully');

    }
}
