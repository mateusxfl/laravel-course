<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    
    // Action padrão da rota events.
    public function index() {

        // Pega todos os eventos do banco de dados.
        $events = Event::all();

        return view('welcome', ['events' => $events]);

    }


    public function show($id) {
           
        // Busca um evento no banco através de seu id.
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);

    }

    // Action que retorna a view para criar eventos.
    public function create() {
        return view('events.create');
    }

    // Action que faz o cadastro de eventos no banco de dados.
    public function store(Request $request) {

        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        // Image upload

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso.');

    }

}
