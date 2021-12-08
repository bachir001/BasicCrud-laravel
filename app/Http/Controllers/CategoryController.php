<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function add(request $request){
        try {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $path = $request->file('image')->store('public/images');
        $category = new Category();
        $category->name = $request->name;
        $category->image = $path;
        
     
        if ($category->save()) {

            return redirect()->route('getview')
            ->with('success','Category added successfully');
        }
    

    }catch (Exception $e) {
        return response()->json($e);
    }
          
    }



    public function upgrade(Request $request,$id ){

        $request->validate([
            'name' => 'required',
        ]);
        
        $category = Category::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $category->image = $path;
        }
        $category->name = $request->name;
       if ($category->save()) {
        return redirect()->route('getview')
        ->with('success','Category updated successfully');
       }
           
        
        }
           

   
    public function read(request $request)
    {
        $data['categories'] = Category::orderBy('id')->paginate(3);
    
          // Get the search value from the request
          $search = $request->input('search');
    
          if ($search!=null) {
  
            // Search in the name  column from the categories table
  
            $categsearchs = Category::query()
  
            ->where('name','LIKE',"%{$search}%")
  
            ->get();

        }else {
            $categsearchs="notyet";
        }
       
        return view('getCategory',$data,compact('categsearchs'));
    }

    public function readbyid($id)
    {
     return Category::where('id',$id)->first();
    }


    public function addview()
    {
        return view('addCategory');
    }
 

    public function editview($id){
        return view('editCategory',['id'=>$id]);
    }
    
   
    public function delete($id)
    {
        try{
           
            if (Category::where('id',$id)->delete()) {
                return redirect()->route('getview')
                ->with('success','Category Deleted successfully');         
              }

        }catch(Exception $e){
            return $e;
        }
    }


       
}
