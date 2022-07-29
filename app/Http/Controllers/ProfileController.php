<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  
    public function index()
    {
        $profile = User::all();
        return view('profile.index', compact('profile'));
    }

    
     /**
    * create
    *
    * @return void
    */
    public function create()
    {
        $locations = Location::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'location_name' => $item->location_name
            ];
        });
        return view('profile.create' , compact('locations', 'profile'));

    }

   
    /**
    * edit
    *
    * @param  mixed 
    * @return void
    */
    public function edit($id)
    {
        $locations = Location::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'location_name' => $item->location_name
            ];
        });
        
        $user = auth()->user();

        return view('profile.edit' , compact('locations' ,'user'));
    }

    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $asset
    * @return void
    */
    public function update(Request $request, User $profile)
    {
        $user = User::find(auth()->user()->id);
        $this->validate($request, [
            'image'         => 'image|mimes:png,jpg,jpeg',
            'name'          => 'required',
            'nik'           => 'required',
            'mobile'        => 'required',
            'departement'   => 'required',
            'location_id'   => 'required',
        ]);

   

        //get data Asset by ID
        $profuserile = User::findOrFail($user->id);
        if($request->file('image') == "") 
        {
            $user->update([
            'name'          => $request->name,
            'nik'           => $request->nik,
            'mobile'        => $request->mobile,
            'departement'   => $request->departement,
            'password'      => Hash::make($request->password),
            'location_id'   => $request->location_id,
            
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/img/avatar/'.$user->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/img/avatar/', $image->hashName());
              
            $user->update([
                'image'          => $image->hashName(),
                'name'           => $request->name,
                'nik'            => $request->nik,
                'mobile'         => $request->mobile,
                'departement'    => $request->departement,
                'password'          => Hash::make($request->password),
                'location_id'    => $request->location_id,
            ]);
        }

    
        if($user){
            //redirect dengan pesan sukses
            return redirect('/profile')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/profile')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

}
