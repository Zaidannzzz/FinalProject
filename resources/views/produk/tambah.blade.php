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
                <li class="breadcrumb-item"><a href="{{route('indexProduk')}}">List Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
              </ol>
            </nav>
        </div>
      </div>

<div class="container">
        <form method="POST" action="{{route('storeProduk')}}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Tambah Produk</div>
                        </div>
                        <div class="ibox-body">
                            <label class="form-label"><b>Nama Produk</b></label>
                            <input name="nama_produk" class="form-control mb-2 input-credit-card" type="text">
                        </div>
                        <div class="ibox-body">
                            <label class="form-title"><b>Deskripsi</b></label>
                            <textarea name="deskripsi" id="editor1" rows="12" cols="94">

                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-body">
                            <label class="form-label"><b>Status</b></label>
                            <select name="status" class="form-control">
                                <option disabled="" value="-" selected="">None</option>
                                <option value="rilis">Rilis</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="ibox-body">
                            <label class="form-label"><b>Kategori</b></label>
                            <select name="kategori_id" class="form-control">
                                <option disabled="" value="-" selected="">None</option>
                                @foreach ($produk as $pro)
                                <option value="{{$pro->id}}">{{$pro->nama_kategori}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="ibox-body">
                            <label class="form-label"><b>Harga</b></label>
                            <input name="harga" class="form-control mb-2 input-credit-card" type="number">
                        </div>
                        <div class="ibox-body">
                            <label class="form-label"><b>Berat</b></label>
                            <input name="berat" class="form-control mb-2 input-credit-card" type="number">
                        </div>
                        <div class="ibox-body">
                            <label for="exampleInputFile"><b>File input</b></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control form-control-file" id="exampleInputFile" name="foto_produk">
                                </div>
                            </div>
                        </div>
                        <div class="ibox-body d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary d-flex justify-content-center mt-4">Tambah</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
    
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace( 'deskripsi' );
    </script>

@stop

@section('css')
    
@stop

@section('js')
    
@stop