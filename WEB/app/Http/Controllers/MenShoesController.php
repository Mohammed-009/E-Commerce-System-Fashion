<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Shoe;
use Illuminate\Support\Facades\Storage;

class MenShoesController extends Controller
{
    //
        //
        public function createMenShoes()
        {
            return view('product7.create');
        }
    
        public function showMenShoes()
        {
            $m__shoes= M_Shoe::all();
            return view('product7.show')->with('m__shoes', $m__shoes);
        }
    
        public function storeMenShoes(Request $request)
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
                $path= $request->file('productImage')->storeAs('public/men_shoes_images', $fileNameToStore);
                }
                else {
                    $fileNameToStore= 'noimage.jpg';
                }
    
            $m__shoes= new M_Shoe();
            $m__shoes->user_id= auth()->user()->id;
            $m__shoes->categoryName= $request->input('categoryName');
            $m__shoes->productName= $request->input('productName');
            $m__shoes->productImage= $fileNameToStore;
            $m__shoes->productPrice= $request->input('productPrice');
            $m__shoes->productSize= $request->input('productSize');
            $m__shoes->productDescription= $request->input('productDescription');
            $m__shoes->save();
            return redirect()->back()->with('success', 'product added successfully');
        }
    
        public function editMenShoes($id)
        {
            $m__shoes= M_Shoe::find($id);
            return view('product7.edit')->with('m__shoes', $m__shoes);
        }
    
        public function updateMenShoes(Request $request, $id)
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
                $path= $request->file('productImage')->storeAs('public/men_shoes_images', $fileNameToStore);
                }
                else {
                    $fileNameToStore= 'noimage.jpg';
                }
    
                $m__shoes= M_Shoe::find($id);
                $m__shoes->categoryName= $request->input('categoryName');
                $m__shoes->productName= $request->input('productName');
                $m__shoes->productImage= $fileNameToStore;
                $m__shoes->productPrice= $request->input('productPrice');
                $m__shoes->productSize= $request->input('productSize');
                $m__shoes->productDescription= $request->input('productDescription');
                $m__shoes->save();
                return redirect()->route('showMenShoes')->with('success', 'product updated successfully');
    
        }
    
        public function deleteMenShoes($id)
        {
            $m__shoes= M_Shoe::find($id);
            if($m__shoes->productImage != 'noimage.jpg')
            {
                Storage::delete('/storage/men_shoes_images/'. $m__shoes->productImage);
            }
            $m__shoes->delete();
            return redirect()->back()->with('success', 'product deleted successfully');
        }
}
