<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildLifestyle;
use Illuminate\Support\Facades\Storage;

class ChildrenLifestyleController extends Controller
{
    //create inputs 
    public function createChildLifestyle()
    {
        return view('products6.Child_Lifestyle');
    }

    //store all records
    public function storeChildLifestyle(Request $request)
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
            $path= $request->file('productImage')->storeAs('public/children_lifestyles_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $child_lifestyle= new ChildLifestyle();
        $child_lifestyle->user_id=auth()->user()->id;
        $child_lifestyle->categoryName= $request->input('categoryName');
        $child_lifestyle->productName= $request->input('productName');
        $child_lifestyle->productImage= $fileNameToStore;
        $child_lifestyle->productPrice= $request->input('productPrice');
        $child_lifestyle->productSize= $request->input('productSize');
        $child_lifestyle->productDescription= $request->input('productDescription');
        $child_lifestyle->save();
        return redirect()->back()->with('success', 'product added successfully');
    }

    //show all records
    public function showChildLifestyle()
    {
        $child_lifestyles= ChildLifestyle::all();
        return view('products6.show_ChildLifestyle')->with('child_lifestyles',$child_lifestyles);
    }

    //edit
    public function editChildLifestyle($id)
    {
        $child_lifestyle= ChildLifestyle::find($id);
        return view('products6.edit_ChildLifestyle')->with('child_lifestyle',$child_lifestyle);
    }

    //update
    public function updateChildLifestyle(Request $request, $id)
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
            $path= $request->file('productImage')->storeAs('public/children_lifestyles_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $child_lifestyle= ChildLifestyle::find($id);
        $child_lifestyle->categoryName= $request->input('categoryName');
        $child_lifestyle->productName= $request->input('productName');
        $child_lifestyle->productImage= $fileNameToStore;
        $child_lifestyle->productPrice= $request->input('productPrice');
        $child_lifestyle->productSize= $request->input('productSize');
        $child_lifestyle->productDescription= $request->input('productDescription');
        $child_lifestyle->save();
        return redirect()->route('showChildLifestyle')->with('success', 'product updated successfully');
    }

    //delete record
    public function deleteChildLifestyle($id)
    {
        $child_lifestyle= ChildLifestyle::find($id);
        if($child_lifestyle->productImage != 'noimage.jpg')
        {
            Storage::delete('/storage/children_lifestyles_images/' .$child_lifestyle->productImage);
        }
        $child_lifestyle->delete();
        return redirect()->back()->with('success','product deleted successfully');
    }
}
