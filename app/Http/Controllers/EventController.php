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

        $validatedTeam = $request->validate([
            'team' => 'required|array',
            'team.*' => 'required|string|distinct'
        ]);

        Event::create($validatedData);

        // Simpan data event
        $event = new Event();
        $event->penyelenggara = $request->input('penyelenggara');
        $event->nama_event = $request->input('nama_event');
        $event->jadwal_event = $request->input('jadwal_event');
        $event->alamat_event = $request->input('alamat_event');
        $event->harga = $request->input('harga');
        $event->dp = $request->input('dp');
        $event->sisa = $request->input('sisa');
        $event->save();

        // Simpan data detail event
        foreach ($request->input('property') as $propertyId) {
            foreach (explode(',', $validatedTeam['team'][0]) as $teamId) {
                $detailEvent = new DetailEvent();
                $detailEvent->id_event = $event->id;
                $detailEvent->id_property = $propertyId;
                $detailEvent->id_team = $teamId;
                $detailEvent->save();
            }
        }

        return redirect('event')->with('success', 'Data Event Berhasil Disimpan');
        // return redirect('event')->with('success', 'Data');
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
            'event' => $event,
            'details' => DetailEvent::where('id_event', 23)->get()
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
        //
        return view('event/edit', [
            'event' => $event
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
        //
        $validatedData = $request->validate([
            'nama_event' => 'required',
        ]);

        event::where('id', $event->id)->update($validatedData);

        return redirect('event')->with('success', 'event berhasil ditambahkan');
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

    public function delete3($id) {
        $data = Event::find($id);
        $data->delete();
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus!');
    }

    
}