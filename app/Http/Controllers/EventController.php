<?php

namespace App\Http\Controllers;

use App\Models\DetailEvent;
use App\Models\Divisi;
use App\Models\Event;
use App\Models\Property;
use App\Models\Team;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('event/index', [
            'dataEvent' => Event::all()
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
        return view('event/add', [
            'dataTeam' => Team::all(),
            'dataProperti' => Property::all(),
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
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'penyelenggara' => 'required',
            'nama_event' => 'required',
            'jadwal_event' => 'required',
            'alamat_event' => 'required',
            'harga' => 'required',
            'dp' => 'required',
            'sisa' => 'required',
        ]);

        // Simpan data event
        $event = new Event();
        $event->penyelenggara = $validatedData['penyelenggara'];
        $event->nama_event = $validatedData['nama_event'];
        $event->jadwal_event = $validatedData['jadwal_event'];
        $event->alamat_event = $validatedData['alamat_event'];
        $event->harga = $validatedData['harga'];
        $event->dp = $validatedData['dp'];
        $event->sisa = $validatedData['sisa'];
        $event->save();

        // Simpan data detail event
        $validatedTeam = $request->validate([
            'team' => 'required|array',
            'team.*' => 'required|string|distinct'
        ]);

        $propertyIds = $request->input('property');
        $teamIds = explode(',', $validatedTeam['team'][0]);

        $countProperties = count($propertyIds);
        $countTeams = count($teamIds);
        $maxIterations = max($countProperties, $countTeams);

        for ($i = 0; $i < $maxIterations; $i++) {
            $propertyId = isset($propertyIds[$i]) ? $propertyIds[$i] : null;
            $teamId = isset($teamIds[$i]) ? $teamIds[$i] : null;

            $detailEvent = new DetailEvent();
            $detailEvent->id_event = $event->id;
            $detailEvent->id_property = $propertyId;
            $detailEvent->id_team = $teamId;
            $detailEvent->save();
        }

        return redirect('event')->with('success', 'Data Event Berhasil Disimpan');
    }













    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        // $request->validate([
        //     'penyelenggara' => 'required',
        //     'nama_event' => 'required',
        //     'jadwal_event' => 'required',
        //     'alamat_event' => 'required',
        //     'harga' => 'required',
        //     'dp' => 'required',
        //     'sisa' => 'required',
        // ]);
        // Event::show($request);
        return view('event.view', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event->load('properties', 'teams');

        return view('event/edit', [
            'event' => $event,
            'dataProperti' => Property::all(),
            'dataTeam' => Team::all(),
        ]);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'penyelenggara' => 'required',
            'nama_event' => 'required',
            'jadwal_event' => 'required',
            'alamat_event' => 'required',
            'harga' => 'required',
            'dp' => 'required',
            'sisa' => 'required',
        ]);

        // Perbarui data event yang ada
        $event->update($validatedData);

        // Simpan atau perbarui data detail event
        $validatedTeam = $request->validate([
            'team' => 'required|array',
            'team.*' => 'required|string|distinct'
        ]);

        // Hapus semua data detail event terkait event ini
        DetailEvent::where('id_event', $event->id)->delete();

        $propertyIds = $request->input('property');
        $teamIds = explode(',', $validatedTeam['team'][0]);

        $countProperties = count($propertyIds);
        $countTeams = count($teamIds);
        $maxIterations = max($countProperties, $countTeams);

        for ($i = 0; $i < $maxIterations; $i++) {
            $propertyId = isset($propertyIds[$i]) ? $propertyIds[$i] : null;
            $teamId = isset($teamIds[$i]) ? $teamIds[$i] : null;

            $detailEvent = new DetailEvent();
            $detailEvent->id_event = $event->id;
            $detailEvent->id_property = $propertyId;
            $detailEvent->id_team = $teamId;
            $detailEvent->save();
        }

        return redirect('event')->with('success', 'Data Event Berhasil Disimpan');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function delete3($id)
    {
        $data = Event::find($id);
        $data->delete();
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus!');
    }
}
