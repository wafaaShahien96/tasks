<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Country;
use App\Models\CountryTranslation;
use App\Models\State;
use App\Models\StateTranslation;
use App\Models\City;
use App\Models\CityTranslation;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('dashboard.user.index' , compact('users'));
    }
     
    public function create()
    {
        return view('dashboard.user.create')->with('countries' , Country::all())->with('states' , State::all());
    }

    public function store(StoreUserRequest $request)
    {
        $user= $request->all();
         if(request()->has('password'))
         {
          $user['password'] = Hash::make($user['password']);
         }
          $user = User::create($request->all());
         return redirect()->route('admin.users.index')->with(['success' , 'User has Created Successfully']);
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit',compact('user'))->with('countries', Country::all())->with('states' , State::all())->with('cities' , City::all());
    }

    public function update(UpdateUserRequest $request ,User $user)
    {
       $user->update($request->all());
       return redirect()->route('admin.users.index')->with('success' , 'User has Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
        return redirect()->route('admin.users.index');
    }
}
