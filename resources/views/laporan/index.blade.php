@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container-fluid pt-3">
    <div class="row">
        <div class="col">
          <h2>Orders</h2>
        </div>
        <div class="col d-flex flex-row-reverse">
          <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb" style="background-color: transparent;">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Order</li>
              </ol>
            </nav>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
                Laporan Order
            </div>
              <div class="container mt-3 mb-3 d-flex justify-content-end align-items-center">
              {{-- <div class="card-tools mr-3">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                    Print By Date
                  </button>
                </div> --}}
                <div class="card-tools">
                <a href="{{route('createLaporan')}}" target="_blank" class="btn btn-primary">Export PDF <i class="ti-printer"></i></a>
                </div>
            </div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Tanggal Awal</label>
          <input name="tglawal" class="form-control mb-2 input-credit-card" type="date">
        </div>
        <div class="form-group">
          <label class="form-label">Tanggal Akhir</label>
          <input name="tglakhir" class="form-control mb-2 input-credit-card" type="date">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="" target="_blank" class="btn btn-primary">Cetak Data</a>
      </div>
    </div>
  </div>
</div> --}}
            
            <div class="container">
            <div class="table-responsive-md">
              <table class="table table-bordered table-striped table-hover mb-0">
                <thead>
                  <tr>
                    <th scope="col">invoiceID</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($laporan as $lap)
                  <tr>
                    <td>{{$lap->invoice_id}}</td>
                    <td>{{$lap->pelanggan->name}}</td>
                    <td>Rp {{number_format($lap->total_harga, 2, ',', ',')}}</td>
                    <td>
                      @if ($lap->status == 'selesai')
                      <span class="badge badge-pill badge-success">{{$lap->status}}</span>
                      @elseif ($lap->status == 'proses')
                      <span class="badge badge-pill badge-warning">{{$lap->status}}</span>
                      @else
                      <span class="badge badge-pill badge-danger">{{$lap->status}}</span>
                      @endif
                    </td>
                    <td>{{$lap->date}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
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