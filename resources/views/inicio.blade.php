
@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')

    <h1>Sistema de Control de Donantes, Donaciones y Reservas de Sangre</h1>

    <p>
        Bienvenido al sistema del Banco de Sangre del Hospital de Apoyo.
    </p>

    <p>
        Proyecto desarrollado con Laravel
        {{ app()->version() }}.
    </p>

    <p>
        Base de datos conectada:
        <strong>{{ DB::connection()->getDatabaseName() }}</strong>
    </p>

    <hr>

    <h2>Panel principal</h2>

    <p>
        Desde esta plataforma se podrá gestionar la información
        de los donantes, evaluaciones, donaciones y reservas de sangre.
    </p>

@endsection
