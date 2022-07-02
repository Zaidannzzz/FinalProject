@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container-fluid pt-3">
  <!-- BreadCrumb -->
  <div class="row">
    <div class="col">
      <h2>Input Order</h2>
    </div>
    <div class="col d-flex flex-row-reverse">
      <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb" style="background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('indexPesanan')}}">List Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Input Order</li>
          </ol>
        </nav>
    </div>
  </div>

  <div class="row">
      <div class="col" style="padding-left: 200px; padding-right: 200px;">
              <div class="card">
                  <div class="card-header">
                      Input Order
                  </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('storePesanan')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                        <label class="form-label">Nama Produk</label>
                        <select name="produk_id" class="form-control">
                            <option disabled="" value="-" selected="">Silahkan Pilih</option>
                            @foreach ($produk as $pro)
                                <option value="{{$pro->id}}">{{$pro->nama_produk}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity</label>
                            <input name="qty" class="form-control mb-2 input-credit-card" type="number">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Nama Pemesan</label>
                            <select name="pelanggan_id" class="form-control">
                                <option disabled="" value="-" selected="">None</option>
                                @foreach ($pelanggan as $gan)
                                    <option value="{{$gan->id}}">{{$gan->name}}</option>
                                @endforeach
                            </select>
                            </div>
                          <div class="form-group">
                            <label class="form-label">Tanggal Order</label>
                            <input name="date" class="form-control mb-2 input-credit-card" type="date">
                          </div>
                          <div class="ibox-body">
                            <label class="form-label"><b>Status</b></label>
                            <select name="status" class="form-control">
                                <option disabled="" value="-" selected="">None</option>
                                <option value="selesai">Selesai</option>
                                <option value="proses">Proses</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col text-center">
                            <button type="submit" class="btn btn-info">Save</button>
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