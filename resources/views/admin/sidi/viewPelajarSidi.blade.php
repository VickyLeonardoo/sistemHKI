@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive p-0">
                    <table id="tablePelajarSidi" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nik</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <tbody>
                            @foreach ($pelajar as $data)
                            <tr>
                                <td>{{  $i++ }}</td>
                                <td>{{ $data->jemaat->nik }}</td>
                                <td>{{ $data->jemaat->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
