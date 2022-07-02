@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container-fluid pt-3">
    <div class="row">
        <div class="col">
          <h2>Pesanan</h2>
        </div>
        <div class="col d-flex flex-row-reverse">
          <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb" style="background-color: transparent;">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                {{-- @if (!request('search'))
                  <li class="breadcrumb-item active" aria-current="page">List Pesanan</li>
                @else
                <li class="breadcrumb-item"><a href="{{route('indexPesanan')}}">List Pesanan</a></li>
                @endif --}}
              </ol>
            </nav>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
                List Pesanan
            </div>
            <div class="container ml-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
              <div class="card-tools">
                <a href="{{route('createPesanan')}}" class="btn btn-primary">Input Pesanan <i class="ti-pencil-alt"></i></a>
              </div>
              {{-- <form method="GET" action="{{route('indexPesanan')}}">
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
            
            <div class="container">
            <div class="table-responsive-md">
              <table class="table table-bordered table-striped table-hover mb-0" id="datatables">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataPesanan as $pesanan)
                  <tr>
                    <td>{{$pesanan->id}}</td>
                    <td>{{$pesanan->invoice_id}}</td>
                    <td>{{$pesanan->produk->nama_produk}}</td>
                    <td>{{$pesanan->qty}}</td>
                    <td>Rp {{number_format($pesanan->total_harga, 2, ',', ',')}}</td>
                    <td>{{$pesanan->pelanggan->name}}</td>
                    <td>{{$pesanan->date}}</td>
                    <td>
                      @if ($pesanan->status == 'selesai')
                      <span class="badge badge-pill badge-success">{{$pesanan->status}}</span>
                      @elseif ($pesanan->status == 'proses')
                      <span class="badge badge-pill badge-warning">{{$pesanan->status}}</span>
                      @else
                      <span class="badge badge-pill badge-danger">{{$pesanan->status}}</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{route('editPesanan', ["id" => $pesanan->id])}}" class="btn btn-sm btn-primary">Edit</a>
                      <a href="{{route('destroyPesanan', ["id" => $pesanan->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              {{-- <div class="d-flex justify-content-end">
                {{$dataPesanan->links()}}
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