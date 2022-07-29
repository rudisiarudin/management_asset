<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Categories;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact('assets'));
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
        $categories = Categories::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });
        $user = User::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });
        return view('asset.create' , compact('locations', 'user', 'categories'));

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
            'image'          => 'required|image|mimes:png,jpg,jpeg',
            'asset_name'     => 'required',
            'asset_code'     => 'required',
            'user_id'    => 'required',
            'location_id'    => 'required',
            'categories_id'    => 'required',
            'brand'          => 'required',
            'serial_number'  => 'required',
            'tag_number'     => 'required',
            'warranty'       => 'required',
            'asset_value'       => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/img', $image->hashName());

        $asset = Asset::create([
            'image'          => $image->hashName(),
            'asset_name'     => $request->asset_name,
            'asset_code'     => $request->asset_code,
            'user_id'       => $request->user_id,
            'location_id'    => $request->location_id,
            'categories_id'    => $request->categories_id,
            'brand'          => $request->brand,
            'serial_number'  => $request->serial_number,
            'tag_number'     => $request->tag_number,
            'warranty'       => $request->warranty,
            'asset_value'    => $request->asset_value,
        ]);

        if($asset){
            //redirect dengan pesan sukses
            return redirect()->route('asset.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('asset.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    /**
    * edit
    *
    * @param  mixed $location
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
        
        $asset = Asset::where('id', $id)->first();

        $categories = Categories::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });
        return view('asset.edit' , compact('locations' , 'asset' , 'categories'));
    }

    public function show($id){
        $asset = Asset::with('categories', 'location')->find($id);
        
        return $asset;
    }

    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $asset
    * @return void
    */
    public function update(Request $request, Asset $asset)
    {
        $this->validate($request, [
            'asset_name'     => 'required',
            'asset_code'     => 'required',
            'location_id'    => 'required',
            'categories_id'    => 'required',
            'brand'          => 'required',
            'serial_number'  => 'required',
            'tag_number'     => 'required',
            'warranty'       => 'required',
            'asset_value'    => 'required'
        ]);

        //get data Asset by ID
        $asset = Asset::findOrFail($asset->id);
        if($request->file('image') == "") 
        {
            $asset->update([
                'asset_name'     => $request->asset_name,
                'asset_code'     => $request->asset_code,
                'location_id'    => $request->location_id,
                'categories_id'  => $request->categories_id,
                'brand'          => $request->brand,
                'serial_number'  => $request->serial_number,
                'tag_number'     => $request->tag_number,
                'warranty'       => $request->warranty,
                'asset_value'    => $request->asset_value,
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/img/'.$asset->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/img', $image->hashName());
            
            $asset->update([
                'image'          => $image->hashName(),
                'asset_name'     => $request->asset_name,
                'asset_code'     => $request->asset_code,
                'location_id'    => $request->location_id,
                'categories_id'    => $request->categories_id,
                'brand'          => $request->brand,
                'serial_number'  => $request->serial_number,
                'tag_number'     => $request->tag_number,
                'warranty'       => $request->warranty,
                'asset_value'    => $request->asset_value,
            ]);
        }

        if($asset){
            //redirect dengan pesan sukses
            return redirect()->route('asset.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('asset.index')->with(['error' => 'Data Gagal Diupdate!']);
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
    $asset = Asset::findOrFail($id);
    $asset->delete();

    if($asset){
        //redirect dengan pesan sukses
        return redirect()->route('asset.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('asset.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }


}
