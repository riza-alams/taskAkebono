@extends('adminlte::page')

@section('title', 'Transaksi Input')

@section('content_header')
    <h1>Transaksi Input</h1>
@stop

@section('content')
{{-- Minimal --}}
<form action="{{route('transaksi.store')}}" method="post">
@csrf
<x-adminlte-input name="tanggal" label="Tanggal" placeholder="Tanngal" type="date" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-calendar text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>
<x-adminlte-select name="lokasi" label="Lokasi" label-class="text-lightblue"
    igroup-size="lg">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-map-marker"></i>
        </div>
    </x-slot>
    @foreach($lokasi as $val)
    <option value="{{$val->id}}">{{$val->NamaLokasi}} || {{$val->kode}}</option>
    @endforeach
</x-adminlte-select>
<x-adminlte-select name="item" label="Item" label-class="text-lightblue"
    igroup-size="lg">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-archive"></i>
        </div>
    </x-slot>
    @foreach($item as $val)
    <option value="{{$val->id}}">{{$val->NamaItem}} || {{$val->Kode}}</option>
    @endforeach
</x-adminlte-select>
<x-adminlte-input name="qty" label="Qty" placeholder="qty" type="number"
    igroup-size="sm" >
    <x-slot name="appendSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-hashtag"></i>
        </div>
    </x-slot>
</x-adminlte-input>
<x-adminlte-button label="Clear" theme="primary" icon="fas fa-broom"  type="reset"/>
<x-adminlte-button label="Submit" theme="success" icon="fas fa-key" type="submit"/>

</form>


@stop



