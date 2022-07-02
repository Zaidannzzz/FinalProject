<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="row">
    <div class="form-group">
        <h2 class="text-center">Laporan Order</h2>
        <p class="text-center">Tanggal/Waktu Cetak Invoice : {{$message}}</p>
        <div class="container-fluid">
            <div class="table-responsive-md">
              <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col">invoiceID</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
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
                  </tr>
                </tbody>
              </table>
              <br>
            </div>
            </div>
    </div>
</div>
</body>
</html>