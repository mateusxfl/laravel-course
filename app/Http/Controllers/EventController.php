<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    
    // Action padrão da rota events.
    public function index() {

        $search = request('search');

        if($search) {
            // Pega os eventos de acordo com a pequisa.
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            // Pega todos os eventos do banco de dados.
            $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);

    }

    public function show($id) {
           
        // Busca um evento no banco através de seu id.
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);

    }

    // Action que retorna a view para criar eventos.
    public function create() {
        return view('events.create');
    }

    // Action que faz o cadastro de eventos no banco de dados.
    public function store(Request $request) {

        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        // Recebe JSON 
        $event->items = $request->items;

        // Image upload

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }else{

            $event->image = 'default.jpg';

        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso.');

    }

}
