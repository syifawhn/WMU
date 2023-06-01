<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('property.index', [
            'properties' => Property::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('property.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_property' => 'required',
            'jumlah_property' => 'required',
            'foto_property' => 'image|file|max:1024',
        ]);

        if ($request->file('foto_property')) {
            $validatedData['foto_property'] = $request->file('foto_property')->store('property-images');
        }


        Property::create($validatedData);

        return redirect('property')->with('success', 'Data property berhasil ditambahkan');

        
        // Property::create($validatedData);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
        return view('property/edit', [
            'property' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
        $validatedData = $request->validate([
            'nama_property' => 'required',
            'jumlah_property' => 'required',
            'foto_property' => 'image|file|max:1024',
        ]);

        if ($request->file('foto_property')) {
            $validatedData['foto_property'] = $request->file('foto_property')->store('property-images');
        }

        Property::where('id', $property->id)->update($validatedData);

        return redirect('property')->with('success', 'Data property berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
        // $data = Property::find($id);
        // $data->delete();
        // return redirect('property')->with('success', 'Property berhasil dihapus!');
    }

    public function delete1($id) {
        $data = Property::find($id);
        $data->delete();
        return redirect()->route('property.index')->with('success', 'Property berhasil dihapus!');
    }


}
