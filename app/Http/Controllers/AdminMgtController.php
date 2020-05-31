<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminPasswordMail;

class AdminMgtController extends Controller
{
    //
    public function allAdmin(){

        $admins = User::where('role_id', 1)->orwhere('role_id',2)->with('role')->paginate(10);

        return view('admin.all',compact('admins'));
    }


    public function create(){

        $roles = Role::get();

        return view('admin.add', compact('roles'));
    }

    public function store(Request $request){

     $data =   request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' =>   ['required', 'integer'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST';
        $randStrPassword =  substr(str_shuffle($permitted_chars), 0, 7);
        array_push($data , $randStrPassword);

        $newAdmin = new User();
        $newAdmin->name = $data['name'];
        $newAdmin->email = $data['email'];
        $newAdmin->role_id = $data['role'];
        $newAdmin->password = Hash::make($data[0]);
        $newAdmin->save();

        Mail::to($data['email'])->send(new AdminPasswordMail($data));

        alert()->success('Check Email For Login Credentials', 'Success')->autoclose(5000);

        return redirect('/dashboard');

    }


    public function changeRole(Request $request , $id){

           $userPermission = User::where('id',$id)->firstorfail();
           $roles = Role::all();

           return view('admin.change-user-role', compact('userPermission', 'roles'));

    }

    public function storeRole(Request $request , $role){

        User::where('id',$role)->update([
            'role_id' => $request->input('role'),
        ]);


        alert()->success('Roles permission changed successfully', 'Success')->autoclose(5000);

        return redirect('/all/admin');
    }

    public function ban(Request $request ,$id)
    {

        // $input = $request->all();
        if(!empty($id)){
            $user = User::find($id);

            $user->bans()->create([
			    'expired_at' => '+1 month',
			    'comment'=>$request->baninfo
			]);
        }


        return redirect('/all/admin')->with('success','Ban Successfully..');
    }

    public function revoke($id)
    {
        if(!empty($id)){
            $user = User::find($id);
            $user->unban();
        }


        return redirect('/all/admin')
        				->with('success','User Revoke Successfully.');
    }
}
