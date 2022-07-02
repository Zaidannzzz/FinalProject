@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container-fluid pt-3">
  <!-- BreadCrumb -->
  <div class="row">
    <div class="col">
      <h2>Edit Kategori</h2>
    </div>
    <div class="col d-flex flex-row-reverse">
      <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb" style="background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('indexKategori')}}">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
          </ol>
        </nav>
    </div>
  </div>

  <div class="row">
      <div class="col" style="padding-left: 200px; padding-right: 200px;">
              <div class="card">
                  <div class="card-header">
                      Edit kategori
                  </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('updateKategori', ["id" => $edit->id])}}"  enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                          <label class="form-label">Nama Kategori</label>
                          <input name="nama_kategori" class="form-control mb-2 input-credit-card" type="text" value="{{$edit->nama_kategori}}">
                        </div>
                        <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="jenis_kategori" class="form-control">
                            <option disabled value="{{$edit->jenis_kategori}}" selected>{{$edit->jenis_kategori}}</option>
                            <option value="Smartphone">Smartphone</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Komputer">Komputer</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                            <button type="submit" class="btn btn-info">Edit Data</button>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
  </div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop