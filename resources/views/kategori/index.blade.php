@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container-fluid pt-3">
  <!-- BreadCrumb -->
  <div class="row">
    <div class="col">
      <h2>Kategori</h2>
    </div>
    <div class="col d-flex flex-row-reverse">
      <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb" style="background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
          </ol>
        </nav>
    </div>
  </div>

  <div class="row">
        <div class="col-4">
              <div class="card">
                  <div class="card-header">
                      kategori Baru
                  </div>
                    <div class="card-body">
                      <form method="POST" action="{{route('storeKategori')}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label class="form-label">Nama Kategori</label>
                          <input name="nama_kategori" class="form-control mb-2 input-credit-card" type="text">
                        </div>
                        <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="jenis_kategori" class="form-control">
                            <option disabled="" value="-" selected="">None</option>
                            <option value="Smartphone">Smartphone</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Komputer">Komputer</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                            <button type="submit" class="btn btn-info">Tambah</button>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            
        <div class="col-8">
          <div class="card">
              <div class="card-header">
                  List Kategori
            </div>
              <br>
              <div class="container">
              <div class="table-responsive-md">
                <table class="table table-bordered table-striped table-hover mb-0" id="datatables">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Parent</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataKategori as $kategori)
                    <tr>
                      <td>{{$kategori->id}}</td>
                      <td>{{$kategori->nama_kategori}}</td>
                      <td>{{$kategori->jenis_kategori}}</td>
                      <td>{{$kategori->created_at->toDateString()}}</td>
                      <td>
                        <a href="{{route('editKategori', ["id" => $kategori->id])}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{route('destroyKategori', ["id" => $kategori->id])}}" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                {{-- <div class="d-flex justify-content-end">
                  {{$dataKategori->links()}}
                </div> --}}
              </div>
            </div>
            </div>
        </div>
  </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop