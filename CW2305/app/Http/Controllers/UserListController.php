<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use DateTime;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        $userList = UserList::orderBy('id')->paginate(10);
        return view('UserList.index',compact('userList'));
    }

    public function create()
    {
        return view('UserList.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required'
        ]);
        $user = new UserList();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->phone=$request->get('phone');
        $user->age=$request->get('age');
        $user->created_at=new DateTime();
        $user->updated_at=new DateTime();

        $user->save();
        return redirect('/userList');
    }

    public function show($id)
    {
        $user=UserList::find($id);
        return view('userList.show',compact('user'));
    }
    
    public function edit($id)
    {
        $user=UserList::find($id);
        return view('userList.edit',compact('user'));
    }
    
    public function update ($id, Request $request)
    {
        $user=UserList::find($id);
        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required'
        ]);
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->phone=$request->get('phone');
        $user->age=$request->get('age');
        $user->updated_at=new DateTime();

        $user->save();
        return redirect('/userList');
    }

    public function destroy($id)
    {
        $user=UserList::find($id);
        $user->delete();
        return redirect('/userList');
    }
}
