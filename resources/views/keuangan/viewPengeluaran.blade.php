@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                        Tambah
                    </button><br><br>
                    <div class="table-responsive p-0">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kode</th>
                                    <th>Nominal</th>
                                    <th>Pembuat</th>
                                    <th></th>

                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($pembayaran as $data)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->pengeluaran->kode }} {{ $data->pengeluaran->nama }}</td>
                                        <td>@currency($data->nominalPengeluaran) </td>
                                        <td>
                                            <span class="badge badge-success">{{ $data->user->name}}</span>
                                        </td>
                                        <td><a href="hapus-data-pembayaran-{{ $data->id }}" class="btn bg-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i
                                                    class="fas fa-trash"></i></a></td>
                                @endforeach
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Total Nominal</th>
                                    <th>@currency($totalNominal)</th>
                                    <th></th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pendapatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card card-primary">
                    <form method="post" action="/simpan-pembayaran">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pendapatan Journal</label>
                                <select name="pendapatan_id" class="form-control form-control-alternative">
                                    <option value="" disabled selected>Pilih Jurnal Pendapatan</option>
                                    @foreach ($pengeluaran as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nominal</label>
                                <input type="number" name="nominal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Catatan</label>
                                <input type="text" name="catatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <input type="date" name="tglDeposit" class="form-control">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
