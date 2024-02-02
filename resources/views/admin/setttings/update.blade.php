@extends('layouts.app')

@section('content')

<div class="card index">
            <div class="card-header">
                <div class="float-start">

<div class="container">

    <h2>Ajustes de Configuración</h2>
    <form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-check">
  <input class="form-check-input" type="checkbox" id="showWinners" name="show_winners" {{ $showWinners ? 'checked' : '' }}>
  <label class="form-check-label" for="showWinners">
  Mostrar Ganadores
  </label>
</div>
             
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
</div>
</div>
</div>

@endsection
