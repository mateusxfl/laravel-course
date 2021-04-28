@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div id="event-create-container" class="col-md-5 offset-md-3">
        <h1>Crie seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf <!-- Blade so permite enviar form se possuir essa diretiva. -->
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" class="form-control-file" name="image" id="image" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Cidade do evento">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado ?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="o que vai acontecer no evento ?"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>

@endsection