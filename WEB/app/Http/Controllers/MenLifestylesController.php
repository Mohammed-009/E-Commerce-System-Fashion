<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\men_lifestyle;
use Illuminate\Support\Facades\Storage;

class MenLifestylesController extends Controller
{
    //
    public function createNewMenLifestyle()
    {
        return view('products4.men_lifestyle');
    }

    public function showMenLifestyle()
    {
        $men_lifestyles= men_lifestyle::all();
        return view('products4.show_menLifestyle')->with('men_lifestyles', $men_lifestyles);
    }

    public function storeMenLifestyle(Request $request)
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
            $path= $request->file('productImage')->storeAs('public/men_lifestyles_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

        $men_lifestyle= new men_lifestyle();
        $men_lifestyle->user_id= auth()->user()->id;
        $men_lifestyle->categoryName= $request->input('categoryName');
        $men_lifestyle->productName= $request->input('productName');
        $men_lifestyle->productImage= $fileNameToStore;
        $men_lifestyle->productPrice= $request->input('productPrice');
        $men_lifestyle->productSize= $request->input('productSize');
        $men_lifestyle->productDescription= $request->input('productDescription');
        $men_lifestyle->save();
        return redirect()->back()->with('success', 'product added successfully');
    }

    public function editMenLifestyle($id)
    {
        $men_lifestyle= men_lifestyle::find($id);
        return view('products4.edit_LifestyleMen')->with('men_lifestyle', $men_lifestyle);
    }

    public function updateMenLifestyle(Request $request, $id)
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
            $path= $request->file('productImage')->storeAs('public/men_lifestyles_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpg';
            }

            $men_lifestyle= men_lifestyle::find($id);
            $men_lifestyle->categoryName= $request->input('categoryName');
            $men_lifestyle->productName= $request->input('productName');
            $men_lifestyle->productImage= $fileNameToStore;
            $men_lifestyle->productPrice= $request->input('productPrice');
            $men_lifestyle->productSize= $request->input('productSize');
            $men_lifestyle->productDescription= $request->input('productDescription');
            $men_lifestyle->save();
            return redirect()->route('showMenLifestyle')->with('success', 'product updated successfully');

    }

    public function deleteMenLifestyleProduct($id)
    {
        $men_lifestyle= men_lifestyle::find($id);
        if($men_lifestyle->productImage != 'noimage.jpg')
        {
            Storage::delete('/storage/men_lifestyles_images/'. $men_lifestyle->productImage);
        }
        $men_lifestyle->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }
    
}
