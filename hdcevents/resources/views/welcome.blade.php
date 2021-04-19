@extends('layouts.main')

@section('title', 'Título')

@section('content')

    @foreach ( $events as $event )

        <p>{{ $event->title }} -- {{ $event->description }}</p>

    @endforeach

@endsection