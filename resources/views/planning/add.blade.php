@extends('adminlte::page')

@section('title', 'Planning Lokasi')

@section('content_header')
<h1>Tambah Planning</h1>
@stop

@section('content')
{{-- Minimal --}}
<form action="{{route('planing.store')}}" method="post">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
    <ul>

        @foreach ($errors->all() as $error)

            <li>{{$error}}</li>
        @endforeach
        </ul>

    </div>

    @endif

    <x-adminlte-input name="qty" label="Qty" type="number" placeholder="Qty" label-class="text-lightblue">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-calendar text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="waktu" step="0.01"  label="Waktu" type="number" placeholder="0.00" label-class="text-lightblue">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-calendar text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-button label="Clear" theme="primary" icon="fas fa-broom" type="reset" />
    <x-adminlte-button label="Submit" theme="success" icon="fas fa-key" type="submit" />

</form>


@stop
