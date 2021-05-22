@extends('adminlte::page')

@section('title', 'Karyawan View')

@section('content_header')
    <h1>Karyawan View</h1>
@stop

@section('content')
@php
$heads = [
    'NO',
    'Npk',
    'Nama',
    'Alamat',
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

$config = [
    'data' => [
        [22, 'John Bender', 'John Bender','+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            
    ],
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => true]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($data as $key =>$row)
        <tr>
                <td>{{++$key}}</td>
                <td>{{$row->Npk}}</td>
                <td>{{$row->Nama}}</td>
                <td>{{$row->Alamat}}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>


@stop



