<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;
use Crypt;
use Auth;


class Handlers extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //controller for
    public function submit(Request $request)
    {

         $request->validate([
             'username'=>"required",
             'email'=> 'required',
             'phone'=>'required | min:10 | max:10',
             'password'=>'required | min:4 | max:16',
         ]);
    


        $user=new User;
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->password=$request->input('password');
        $user->save();

        return redirect('login');

    }

    public function index(Request $request)
    {
        $request->validate([
            'username'=>"required",
            'password'=>'required | min:4 | max:16'
        ]);


        $check=User::where(['username'=>$request->input('username'),'password'=>$request->input('password')])->exists();
        if($check){
            if($request->input('username')=='shubh' && $request->input('password')=='sharma'){

                $request->session()->put('admin',$request->input('username'));
                return redirect('/');
            }
            else{
                $request->session()->put('user',$request->input('username'));
                return redirect('/');
            }
        }
        else{
            $request->session()->flash('message',"Either the username or password is incorrect");
            return redirect()->back();
        }
   
    }

    public function logout()
    {
       Session::flush();
       return Redirect('login');
    }

    public function list(){
        
        $db=User::select('*')->simplePaginate(8);
        return view('Auth.list',['data'=>$db]);
    }
}
