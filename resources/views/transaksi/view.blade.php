@extends('adminlte::page')

@section('title', 'Transaksi View')

@section('content_header')
    <h1>Transaksi View</h1>
@stop

@section('content')
@php
$heads = [
    'NO',
    'Tanggal',
    'Kode Item',
    'Nama Item',
    'Kode Lokasi',
    'Nama Lokasi',
    'Qty Actual',
    'Created By',
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
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => true]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($user as $key => $row)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$row->create_date}}</td>
            <td>{{$row->item_kode}}</td>
            <td>{{$row->item_name}}</td>
            <td>{{$row->lokasi_kode}}</td>
            <td>{{$row->lokasi_name }}</td>
            <td>{{$row->qty }}</td>
            <td>{{( $row->login_name ?$row->login_name.' - '.'admin': $row->karyawan_name.' - '.$row->Npk ) }}</td>
        </tr>
    @endforeach
</x-adminlte-datatable>


@stop



