@extends('layouts.master')

@section('title', 'Artikel Detail')


@section('content')

                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ">
            <!-- Content Header (Page header) -->
            <div class="card">
                <div class="card-header">
                    <h4>List Pertanyaan</h4>
                    <a href="{{url('artikel/create')}}" class="btn btn-primary" title="tambah pertanyaan"><i class="fa fa-plus"></i> Data</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Slug</th>
                        <th>Tag</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($artikel as $data)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->judul }}</td>
                            <td>{{$data->isi}}</td>
                            <td>{{$data->slug}}</td>
                            <td>{{$data->tag}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('artikel/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm rounded-pill mx-2"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('artikel/'.$data->id) }}" class="btn btn-success btn-sm rounded-pill mx-2"><i class="fa fa-eye"></i></a>
                                    <form action="{{ url('artikel/'.$data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill mx-2" onclick="confirm('Apakah Anda yakin hapus {{'$artikel->judul'}} ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            </tr>                   
                        @endforeach
                        </tbody>
                </table>
                </div>
            </div>
        </div>
  <!-- /.content-wrapper -->

@endsection