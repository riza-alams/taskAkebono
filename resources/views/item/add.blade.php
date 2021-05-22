@extends('adminlte::page')

@section('title', 'Tambah Item')

@section('content_header')
<h1>Tambah Item</h1>
@stop

@section('content')
{{-- Minimal --}}
<form action="{{route('item.store')}}" method="post">
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

    <x-adminlte-input name="NamaItem" label="Nama Item" placeholder="nama" label-class="text-lightblue">
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
