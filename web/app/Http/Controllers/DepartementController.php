<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departement = Departement::paginate(50);
        return view('departement.index', compact('departement'));
    }

     /**
    * create
    *
    * @return void
    */
    public function create()
    {
        $user = User::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'role_id' => $item->role_id
            ];
        });
        return view('departement.create' , compact('user'));
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
            'user_id'     => 'required'
        ]);


        $departement = Departement::create([
            'name'     => $request->name,
            'user_id'     => $request->user_id,
            
        ]);

        if($departement){
            //redirect dengan pesan sukses
            return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('departement.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * edit
    *
    * @param  mixed 
    * @return void
    */
    public function edit(Departement $departement)
    {
        $user = User::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'role_id' => $item->role_id
            ];
        });
        
        return view('departement.edit', compact('user','departement'));
    }


    /**
    * update
    *
    * @param  mixed 
    * @param  mixed
    * @return void
    */
    public function update(Request $request, Departement $departement)
    {
        $this->validate($request, [
            'name'     => 'required',
            'role_id'     => 'required'
        ]);

        //get data Location by ID
        $departement = Departement::findOrFail($departement->id);

    

            $departement->update([
                'name'     => $request->name,
                'role_id'     => $request->role_id,
            ]);

        

        if($departement){
            //redirect dengan pesan sukses
            return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('departement.index')->with(['error' => 'Data Gagal Diupdate!']);
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
    $departement = Departement::findOrFail($id);
    $departement->delete();

    if($departement){
        //redirect dengan pesan sukses
        return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('departement.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
