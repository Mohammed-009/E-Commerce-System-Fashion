<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children_official;
use Illuminate\Support\Facades\Storage;

class ChildrenController extends Controller
{
    //
    //store student official in the database
    public function storeChildrenOfficial(Request $request)
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
            $path= $request->file('productImage')->storeAs('public/children_officials_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $children_official= new Children_official();
        $children_official->user_id=auth()->user()->id;
        $children_official->categoryName= $request->input('categoryName');
        $children_official->productName= $request->input('productName');
        $children_official->productImage= $fileNameToStore;
        $children_official->productPrice= $request->input('productPrice');
        $children_official->productSize= $request->input('productSize');
        $children_official->productDescription= $request->input('productDescription');
        $children_official->save();
        return redirect()->back()->with('success', 'product added successfully');
    }


    //create new student official record
    public function createNewChildrenOfficial()
    {
        return view('products3.create_children');
    }

    //show all student items records
    public function showChildrenOfficial()
    {
        $children_officials= Children_official::all();
        return view('products3.show_children')->with('children_officials', $children_officials);
    }

    //edit children official
    public function editChildrenProduct($id)
    {
        $children_official= Children_official::find($id);
        return view('products3.edit_children')->with('children_official', $children_official);
    }

    //update children official
    public function updateChildrenProduct(Request $request, $id)
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
            $path= $request->file('productImage')->storeAs('public/children_officials_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $children_official= Children_official::find($id);
        $children_official->categoryName= $request->input('categoryName');
        $children_official->productName= $request->input('productName');
        $children_official->productImage= $fileNameToStore;
        $children_official->productPrice= $request->input('productPrice');
        $children_official->productSize= $request->input('productSize');
        $children_official->productDescription= $request->input('productDescription');
        $children_official->save();
        return redirect()->route('showChildrenOfficial')->with('success', 'product updated successfully');
    }

    //delete 
    public function deleteChildrenProduct($id)
    {
        $children_official= Children_official::find($id);
        if($children_official->productImage != 'noimage.jpg')
        {
            Storage::delete('/storage/children_officials_images/'. $children_official->productImage);
        }
        $children_official->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
