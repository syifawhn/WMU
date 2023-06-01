<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('team/index', [
            'dataTeam' => Team::all()
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
        return view('team/add', [
            'dataDivisi' => Divisi::all()
        ]);
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
            'nama' => 'required',
            'id_divisi' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'foto_team' => 'image|file|max:1024',
        ]);

        

        if ($request->file('foto_team')) {
            $validatedData['foto_team'] = $request->file('foto_team')->store('team-images');
        }

        Team::create($validatedData);

        return redirect('team')->with('success', 'Data Divisi Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        return view('team/edit', [
            'team' => $team,
            'dataDivisi' => Divisi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'id_divisi' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'foto_team' => 'image|file|max:1024',
        ]);

        if ($request->file('foto_team')) {
            $validatedData['foto_team'] = $request->file('foto_team')->store('team-images');
        }

        Team::where('id', $team->id)->update($validatedData);

        return redirect('team')->with('success', 'Data team berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function delete($id) {
        $data = Team::find($id);
        $data->delete();

        return redirect()->route('team.index')->with('success', 'Team berhasil dihapus!');
    }
}
