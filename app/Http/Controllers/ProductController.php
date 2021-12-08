<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   
    
    
        public function add(request $request){
            try {

            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'categoryname'=>'required',
                'description'=>'required',
                'name'=>'required',
            ]);
            $path = $request->file('image')->store('public/images');
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->categoryname;
            $product->image = $path;
            
         
            if ($product->save()) {
    
                return redirect()->route('getproduct')
                ->with('success','Product added successfully');
    
            }
        
    
        }catch (Exception $e) {
            return response()->json($e);
        }
              
        }


        
    
    
    
        public function upgrade(Request $request,$id ){
    
            $request->validate([
                'categoryname'=>'required',
                'description'=>'required',
                'name'=>'required',
            ]);
            
            $product = Product::find($id);
            if($request->hasFile('image')){
                $request->validate([
                  'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
                $path = $request->file('image')->store('public/images');
                $product->image = $path;
            }
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->categoryname;

            if ($product->save()) {
            return redirect()->route('getproduct')
            ->with('success','Product updated successfully');
           }
               
            
            }
               
    
       
        public function readp(request $request)
        {
            $data['products'] = Product::orderBy('id')->paginate(3);
        
              // Get the search value from the request
              $search = $request->input('search');
        
              if ($search!=null) {
      
                // Search in the name  column from the products table
      
                $productsearchs = Product::query()
      
                ->where('name','LIKE',"%{$search}%")
      
                ->get();
    
            }else {
                $productsearchs="notyet";
            }
           
            return view('getProducts',$data,compact('productsearchs'));
        }
    


        public function addview()
        {
            return view('addProduct');
        }
     
    
        public function editview($id){
            return view('editProduct',['id'=>$id]);
        }
        
        public function delete($id)
        {
            try{
                
                if (Product::where('id',$id)->delete()) {
                    return redirect()->route('getproduct')
                    ->with('success','Product Deleted successfully');         
                  }
    
            }catch(Exception $e){
                return $e;
            }
        }
    
    
           
    }

