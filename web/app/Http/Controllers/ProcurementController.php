<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Location;
use App\Models\Procurement;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index()
    {
        $procurement = Procurement::all();
        return view('procurement.index', compact('procurement'));
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
       
        return view('procurement.create' , compact('locations'));

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
            'request_name'     => 'required',
            'qty'    => 'required',
            'location_id'    => 'required',
        ]);



        $procurement = Procurement::create([
            'request_name'     => $request->request_name,
            'qty'     => $request->qty,
            'location_id'    => $request->location_id,
            'user_id' => auth()->user()->id,
            'departement' => auth()->user()->departement
        ]);

        if($procurement){
            //redirect dengan pesan sukses
            return redirect()->route('procurement.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('procurement.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    
    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $asset
    * @return void
    */
    public function update($id, Request $request)
    {
        if (isset($request->approve)) {
            $status = 2;
        } elseif (isset($request->reject)) {
            $status = 3;
        }

        Procurement::find($id)->update(['status' => $status]);
        
        return redirect()->route('procurement.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    


}
