@extends('layouts.master')

@section('title', 'Tambah Artikel')

@section('content')


    <!-- DataTales Example -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
        </ol>

        <div class="col-sm-11 mx-auto">
            <div class="card shadow mb-4">    
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Artikel</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/artikel/'. $artikel->id)}}">
                     {{ csrf_field() }}
                     @method('put')
                        <div class="form-group">
                            <label for="judulPertanyaa">Judul Artikel</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{$artikel->judul}}" placeholder="Masukkan Judul Pertanyaan">
                            @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isiPertanyaan">Isi Artikel</label>
                            <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" value="{{$artikel->isi}}" placeholder="Masukkan Isi Artikel"> 
                            @error('isi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isiPertanyaan">Tag</label>
                            <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" value="{{$artikel->tag}}" placeholder="Masukkan Tag Artikel"> 
                            @error('tag')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ '/artikel' }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>

@endsection
