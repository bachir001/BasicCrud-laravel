<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    /**
     * Display user login view
     *
     * @return \Illuminate\View\View
     */
    
     public function showLoginForm()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('user.dashboard');
        } else {
            return view('auth.userLogin');
        }
    }

    /**
     * Handle an incoming user authentication request.
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(auth()->guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/user/dashboard'));
        } else {
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
    }


       public function add(request $request){
          
             try {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required'],
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            event(new Registered($user));
    
            // Auth::login($user);
    
            return redirect()->route('getuserview')
                ->with('success','User added successfully');

         } catch (Exception $e) {
            return response()->json($e);
         }

         
        }


    public function readu(request $request)
       {

        $users = User::orderBy('id')->paginate(3);
    
        // Get the search value from the request
        $search = $request->input('search');
  
        if ($search!=null) {

          // Search in the name  column from the categories table

          $usersearchs = User::query()

          ->where('name','LIKE',"%{$search}%")

          ->get();

      }else {
          $usersearchs="notyet";
      }
     

      
      return view('getUsers',compact('users'),compact('usersearchs'));
    
    }



    

    public function upgrade(Request $request,$id)
      {
            try{


                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required'],
                ]);

          
                $user = User::where('id',$id)->first();
            
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            
            

            if ( $user->save()) {
            return redirect()->route('getuserview')
            ->with('success','User updated successfully');
            }

            }catch(Exception $e){
                return $e;
            }
        }



    public function addview()
    {
        return view('addUser');
    }


    public function editview($id)
    {
        return view('editUser',['id'=>$id]);
    }


    public function delete($id)
    {
        try{
            if (User::where('id',$id)->delete()) {
                return redirect()->route('getuserview')
                ->with('success','User Deleted successfully');         
              }

        }catch(Exception $e){
            return $e;
        }
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}