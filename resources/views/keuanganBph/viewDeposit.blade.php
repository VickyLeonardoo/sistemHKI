@extends('bph.partials.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                        Tambah
                    </button><br><br>
                    <div class="table-responsive p-0">
                        <table id="viewDeposit" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Kode</th>
                                    <th>Nominal</th>
                                    <th>Pembuat</th>
                                    <th></th>

                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($deposit as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ Date::parse($data->tglDeposit)->formatLocalized('%d %B %Y') }}</td>
                                        <td>{{ $data->pendapatan->kode }} {{ $data->pendapatan->nama }}</td>
                                        <td>@currency($data->nominalPendapatan) </td>
                                        <td>
                                            <span class="badge badge-success">{{ $data->user->name}}</span>
                                        </td>
                                        <td>
                                            <a href="hapus-data-deposit-{{ $data->id }}" class="btn bg-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total Nominal</th>
                                    <th>@currency($totalNominal)</th>
                                    <th></th>
                                    <th></th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <br><br>
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
                    <form method="post" action="/simpan-deposit">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pendapatan Journal</label>
                                <select name="pendapatan_id" class="form-control form-control-alternative">
                                    <option value="" disabled selected>Pilih Jurnal Pendapatan</option>
                                    @foreach ($pendapatan as $data)
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
