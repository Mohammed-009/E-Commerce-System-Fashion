<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Women_official;
use Illuminate\Support\Facades\Storage;

class WomenController extends Controller
{
    //
    public function storeWomenOfficial(Request $request)
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
            $path= $request->file('productImage')->storeAs('public/women_officials_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $women_official= new Women_official();
        // $women_official->categoryName= $request->input('categoryName');
        $women_official->user_id= auth()->user()->id;
        $women_official->categoryName= $request->input('categoryName');
        $women_official->productName= $request->input('productName');
        $women_official->productImage= $fileNameToStore;
        $women_official->productPrice= $request->input('productPrice');
        $women_official->productSize= $request->input('productSize');
        $women_official->productDescription= $request->input('productDescription');
        $women_official->save();
        return redirect()->back()->with('success', 'product added successfully');
    }

    public function createNewWomenOfficial()
    {
        return view('products2.women_official');
    }

    public function showWomenOfficial()
    {
        $women_officials= Women_official::all();
        return view('products2.show_women')->with('women_officials', $women_officials);
    }

    public function editWomenProduct($id)
    {
        $women_official= Women_official::find($id);
        return view('products2.edit_women')->with('women_official', $women_official);
    }

    public function updateWomenProduct(Request $request, $id)
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
            $path= $request->file('productImage')->storeAs('public/women_officials_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $women_official= Women_official::find($id);
        $women_official->categoryName= $request->input('categoryName');
        // $women_official->user_id= auth()->user()->id;
        $women_official->categoryName= $request->input('categoryName');
        $women_official->productName= $request->input('productName');
        $women_official->productImage= $fileNameToStore;
        $women_official->productPrice= $request->input('productPrice');
        $women_official->productSize= $request->input('productSize');
        $women_official->productDescription= $request->input('productDescription');
        $women_official->save();
        return redirect()->back()->with('success', 'product updated successfully');
    }

    public function deleteWomenProduct($id)
    {
        $women_official= Women_official::find($id);
        if($women_official->productImage != 'noimage.jpg')
        {
            Storage::delete('/public/women_officials_images'. $women_official->productImage);
        }
        $women_official->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
