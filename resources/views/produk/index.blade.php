@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container-fluid pt-3">
    <div class="row">
        <div class="col">
          <h2>Produk</h2>
        </div>
        <div class="col d-flex flex-row-reverse">
          <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb" style="background-color: transparent;">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                {{-- @if (!request('search'))
                  <li class="breadcrumb-item active" aria-current="page">Produk List</li>
                @else
                <li class="breadcrumb-item"><a href="{{route('indexProduk')}}">Produk List</a></li>
                @endif --}}
              </ol>
            </nav>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
                List Produk
            </div>
              <div class="container ml-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
              <div class="card-tools">
                {{-- <a href="{{route('importProduk')}}" target="_blank" class="btn btn-danger mr-2">Mass Upload <i class="ti-import"></i></a> --}}
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#exampleModal">
                  Mass Upload <i class="ti-import"></i>
                </button>
                <a href="{{route('downloadProduk')}}" class="btn btn-success mr-2">Download CSV <i class="ti-export"></i></a>
                <a href="{{route('createProduk')}}" class="btn btn-primary">Tambah Data <i class="ti-plus"></i></a>
              </div>
              {{-- <form method="GET" action="{{route('indexProduk')}}">
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="search" class="form-control float-right" placeholder="Cari...">
                <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                <b>Cari</b>
                </button>
                </div>
                </div>
                </div>
              </form> --}}
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mass Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('importProduk')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Masukan File .csv</label>
          <input name="produk_csv" class="form-control mb-2 input-credit-card" type="file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import Data</button>
      </div>
    </form>
    </div>
  </div>
</div>

            <div class="container">
            <div class="table-responsive-md">
              <table class="table table-bordered table-striped table-hover mb-0" id="datatables">
                <thead>
                  <tr>
                    <th scope="col">Foto Produk</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataProduk as $produk)
                  <tr>
                    <td><img width="70" height="70" src="{{asset('gambar_produk/'.$produk->foto_produk)}}" class="d-inline-block align-top" alt=""></td>
                    <td>
                      {{$produk->nama_produk}} <br>
                      Kategori : <span class="badge badge-pill badge-info">{{$produk->kategori->nama_kategori}}</span> <br>
                      @if ($produk->kategori->jenis_kategori == "Smartphone")
                        Berat : <span class="badge badge-pill badge-info">{{$produk->berat}} gr</span>  <br>
                      @elseif ($produk->kategori->jenis_kategori == "Lain-lain")
                        Berat : <span class="badge badge-pill badge-info">{{$produk->berat}} gr</span>  <br>
                      @else
                        Berat : <span class="badge badge-pill badge-info">{{$produk->berat}} kg</span>  <br>
                      @endif
                    </td>
                    <td>Rp {{number_format($produk->harga, 2, ',', ',')}}</td>
                    <td>{{$produk->created_at->toDateString()}}</td>
                    <td>
                      @if ($produk->status == 'draft')
                      <span class="badge badge-pill badge-secondary">{{$produk->status}}</span>
                      @else
                      <span class="badge badge-pill badge-warning">{{$produk->status}}</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{route('editProduk', ["id" => $produk->id])}}" class="btn btn-sm btn-primary">Edit</a>
                      <a href="{{route('destroyProduk', ["id" => $produk->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              {{-- <div class="d-flex justify-content-end">
                {{$dataProduk->links()}}
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