<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    
    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        if (!Gate::allows('isSuperAdmin')) {
            abort(403);
        }

        $locations = Location::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'location_name' => $item->location_name
            ];
        });

      
        return view('user.create' , compact('locations'));
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'     => 'required',
            'nik'           => 'required',
            'mobile'             => 'required',
            'role_id'             => 'required',
            'departement'             => 'required',
            'password'      => 'required|string|min:8|confirmed',
            'location_id'             => 'required'
        ]);

       
        $user = User::create([
            'name'     => $request->name,
            'email'     => $request->email,
            'nik'           => $request->nik,
            'mobile'             => $request->mobile,
            'role_id'             => $request->role_id,
            'departement'             => $request->departement,
            'password'          => Hash::make($request->password),
            'location_id'             => $request->location_id,
        
        ]);

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * edit
    *
    * @param  mixed $location
    * @return void
    */
    public function edit(User $user)
    {
        if (!Gate::allows('isSuperAdmin')) {
            abort(403);
        }
        $locations = Location::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'location_name' => $item->location_name
            ];
        });
        return view('user.edit' , compact('locations','user'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $location
    * @return void
    */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required',
            'nik'           => 'required',
            'mobile'        => 'required',
            'location_id'   => 'required',
            'departement'   => 'required'
        ]);

        //get data Location by ID
        $user = User::findOrFail($user->id);

        $user->update([
        'name'     => $request->name,
        'email'     => $request->email,
        'nik'           => $request->nik,
        'mobile'             => $request->mobile,
        'location_id'             => $request->location_id,
        'role_id'             => $request->role_id,
        'departement'             => $request->departement,
        ]);
        

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    /**
    * destroy
    *
    * @param  mixed $id
    * @return void
    */
    public function destroy($id)
    {
        if (!Gate::allows('isSuperAdmin')) {
            abort(403);
        }
    $user = User::findOrFail($id);
    $user->delete();

    if($user){
        //redirect dengan pesan sukses
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('user.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
