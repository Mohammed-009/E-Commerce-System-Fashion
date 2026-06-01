<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children_Shoe;
use Illuminate\Support\Facades\Storage;

class ChildrenShoesController extends Controller
{
        //
    public function createChildrenShoes()
    {
        return view('product9.create');
    }

    public function showChildrenShoes()
    {
        $children_shoes= Children_Shoe::all();
        return view('product9.show')->with('children_shoes', $children_shoes);
    }

    public function storeChildrenShoes(Request $request)
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
            $path= $request->file('productImage')->storeAs('public/children_shoes_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $children_shoes= new Children_Shoe();
        $children_shoes->user_id= auth()->user()->id;
        $children_shoes->categoryName= $request->input('categoryName');
        $children_shoes->productName= $request->input('productName');
        $children_shoes->productImage= $fileNameToStore;
        $children_shoes->productPrice= $request->input('productPrice');
        $children_shoes->productSize= $request->input('productSize');
        $children_shoes->productDescription= $request->input('productDescription');
        $children_shoes->save();
        return redirect()->back()->with('success', 'product added successfully');
    }

    public function editChildrenShoes($id)
    {
        $children_shoes= Children_Shoe::find($id);
        return view('product9.edit')->with('children_shoes', $children_shoes);
    }

    public function updateChildrenShoes(Request $request, $id)
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
            $path= $request->file('productImage')->storeAs('public/children_shoes_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

            $children_shoes= Children_Shoe::find($id);
            $children_shoes->categoryName= $request->input('categoryName');
            $children_shoes->productName= $request->input('productName');
            $children_shoes->productImage= $fileNameToStore;
            $children_shoes->productPrice= $request->input('productPrice');
            $children_shoes->productSize= $request->input('productSize');
            $children_shoes->productDescription= $request->input('productDescription');
            $children_shoes->save();
            return redirect()->route('showChildrenShoes')->with('success', 'product updated successfully');

    }

    public function deleteChildrenShoes($id)
    {
        $children_shoes= Children_Shoe::find($id);
        if($children_shoes->productImage != 'noimage.jpg')
        {
            Storage::delete('/storage/children_shoes_images/'. $children_shoes->productImage);
        }
        $children_shoes->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
