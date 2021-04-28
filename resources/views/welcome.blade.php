@extends('layouts.main')

@section('title', 'Título')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p>Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    @if($event->image != "default.jpg")
                        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
                    @else
                        <img src="/img/banner.jpg" class="img-fluid" alt="{{ $event->title }}">
                    @endif
                    <div class="card-body">
                        <p class="card-date">10/09/2020</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection