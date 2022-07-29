<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;


class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::paginate(50);
        return view('location.index', compact('locations'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('location.create');
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
            'location_name'     => 'required',
            'location_code'     => 'required',
            'address'           => 'required',
            'phone'             => 'required'
        ]);

       
        $location = Location::create([
            'location_name'     => $request->location_name,
            'location_code'     => $request->location_code,
            'address'           => $request->address,
            'phone'             => $request->phone,
        ]);

        if($location){
            //redirect dengan pesan sukses
            return redirect()->route('location.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('location.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * edit
    *
    * @param  mixed $location
    * @return void
    */
    public function edit(Location $location)
    {
        return view('location.edit', compact('location'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $location
    * @return void
    */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'location_name'     => 'required',
            'location_code'     => 'required',
            'address'           => 'required',
            'phone'             => 'required'
        ]);

        //get data Location by ID
        $location = Location::findOrFail($location->id);

    

            $location->update([
                'location_name'      => $request->location_name,
                'location_code'      => $request->location_code,
                'address'            => $request->address,
                'phone'              => $request->phone
            ]);

        

        if($location){
            //redirect dengan pesan sukses
            return redirect()->route('location.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('location.index')->with(['error' => 'Data Gagal Diupdate!']);
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
    $location = Location::findOrFail($id);
    $location->delete();

    if($location){
        //redirect dengan pesan sukses
        return redirect()->route('location.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('location.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete($id)
    {
        Location::find($id)->delete();
  
        return back();
    }
}
