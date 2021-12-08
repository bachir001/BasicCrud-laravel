<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PhpParser\Node\Stmt\Catch_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function add(request $request){
          
    //         $admin = new Admin();
    //         try {
    //         $admin->fill(
    //          $request->all()
    //         );
    //         $admin->save();
    //     } catch (Exception $e) {
    //         return response()->json($e);
    //     }
    //         dd($request);    
    //     }
       
    //     public function read()
    //     {
    //      return Admin::all();
    //     }


    //     public function upgrade(Request $request,$id)
    //     {
    //         try{
    //         $admins = Admin::where('id',$id)->first();
    //         $admins->update($request->all());    
    //         }catch(Exception $e){
    //             return $e;
    //         }
    //     }
    
        
    //     public function delete($id)
    //     {
    //         try{
            
    //             Admin::where('id',$id)->delete();
    //         }catch(Exception $e){
    //             return $e;
    //         }
        
    //     }
           
}
