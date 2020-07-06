@extends('layouts/master')

@section('title', 'Daftar Artikel')

@section('content')

    <!-- DataTales Example -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{'/artikel'}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Artikel</li>
          </ol>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="m-0 ">Baca Artikel</h1>
            </div>

            
            <!-- Button trigger modal -->
            
              <div class="card-body">
                <div class="card-header">
                    <h2>{{$artikel->judul}}</h2>
                    <p>slug:{{$artikel->slug}}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$artikel->isi}}</h5>
                </div>
                <div class="card-footer">
                      @foreach(explode(' ', $artikel->tag) as $value)
                        <p class="btn btn-primary">{{ $value }} </p>
                      @endforeach
                </div>
              </div>
            </div>


@endsection