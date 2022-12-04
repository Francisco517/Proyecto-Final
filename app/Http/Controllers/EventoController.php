<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evento;
use App\Models\Archivos;
use App\Mail\NotificaEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $evento, User $user)
    {   
        if (! Gate::denies('Edit', $evento)) {
            $eventos = Evento::all();
            return view('eventosIndex', compact('eventos')); 
        }    
        $eventos = Evento::where('user_id', Auth::id())->get();
        return view('eventosIndex', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventosCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required|max:255',
            'correo'=>'required|email',
            'telefono'=>'required|max:20',
            'pedidos'=>'required|max:255',
        ]);

        $request->merge(['user_id'=>Auth::id()]);
        $evento = Evento::create($request->all());

        //archivos//
        if($request->file('archivo')->isValid()){
            $ubicacion = $request->archivo->store('evento');
            $archivo = new Archivos();
            //$archivo ->evento_id = $evento->id;
            $archivo->ubicacion = $ubicacion;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = '';
            //$archivo->save();
            
            $evento->archivos()->save($archivo);

        }
        return redirect('/evento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('eventosShow',compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        if (! Gate::allows('Edit', $evento)) {
            abort(403);
        }
        return view('eventosEdit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nombre'=> 'required|max:255',
            'correo'=>'required|email',
            'telefono'=>'required|max:20',
            'pedidos'=>'required|max:255',
        ]);

        Evento::where('id',$evento->id)->update($request->except('_token','_method'));
        return redirect('/evento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect('/evento');
    }

    public function notificarEvento(Evento $evento)
    {
        Mail::to($evento->user->email)->send(new NotificaEvento($evento));
        return back();
    }

    public function descargaArchivo(Archivos $archivo)
    {
        return Storage::download($archivo->ubicacion);
    }
}
