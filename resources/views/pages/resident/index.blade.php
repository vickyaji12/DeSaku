@extends('layouts.app')

@section('content')
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
        <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah
        </a>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>{{ $item->nik }}</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                                <th>Telepon</th>
                                <th>Status Penduduk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residents as $item)
                            <tr>
                                <td>NIK</td>
                                <td>Nama</td>
                                <td>Jenis Kelamin</td>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>Alamat</td>
                                <td>Agama</td>
                                <td>Status Perkawinan</td>
                                <td>Pekerjaan</td>
                                <td>Telepon</td>
                                <td>Status Penduduk</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/resident/{id}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                        <i class="fas fa-pen"></i></a>
                                        <a href="/resident/{id}" class="btn btn-sm btn-danger">
                                            <i class="fas fa-eraser"></i></a>
                                    </div>
                                </td>
                            </tr>    
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

@endsection