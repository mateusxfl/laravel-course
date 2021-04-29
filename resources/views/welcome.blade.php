@extends('layouts.main')

@section('title', 'Título')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <div class="row">
                <div class="col-md-10">
                    @if($search)
                        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar" value="{{ $search }}">
                    @else
                        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
                    @endif
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary form-control" value="Buscar">
                </div>
            </div>
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos eventos</h2>
            <p>Veja os eventos dos próximos dias</p>
        @endif
        
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    @if($event->image != "default.jpg")
                        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
                    @else
                        <img src="/img/banner.jpg" class="img-fluid" alt="{{ $event->title }}">
                    @endif
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento correspondente a busca: "{{ $search }}", <a href="/">voltar a tela inicial.</a>.</p>
        @elseif(count($events) == 0)
            <h2>Não há eventos disponíveis.</h2>
        @endif
    
    </div>

@endsection