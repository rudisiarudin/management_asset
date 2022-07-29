<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::paginate(50);
        return view('categories.index', compact('categories'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('categories.create');
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
            'group'     => 'required',
            
        ]);

       
        $categories = Categories::create([
            'name'     => $request->name,
            'group'     => $request->group,
            
        ]);

        if($categories){
            //redirect dengan pesan sukses
            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * edit
    *
    * @param  mixed $categories
    * @return void
    */
    public function edit($categories)
    {
        $categories = Categories::find($categories);
        return redirect()->route('categories.edit');
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $categories
    * @return void
    */
    public function update(Request $request, Categories $categories)
    {
        $this->validate($request, [
            'name'     => 'required',
            'group'     => 'required',
            
        ]);

        //get data categories by ID
        $categories = Categories::findOrFail($categories->id);

    

            $categories->update([
                'name'      => $request->name,
                'group'      => $request->group,
                
            ]);

        

        if($categories){
            //redirect dengan pesan sukses
            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories.index')->with(['error' => 'Data Gagal Diupdate!']);
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
    $categories = Categories::findOrFail($id);
    $categories->delete();

    if($categories){
        //redirect dengan pesan sukses
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('categories.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
