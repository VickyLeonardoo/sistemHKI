@extends('bph.partials.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive p-0">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Wijk</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            @foreach ($wijk as $data)
                            <tr>
                                <td>{{ $data->id}}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    {{-- <a href="ubah-data-wijk-{{ $data->id }}" class="btn btn-primary"></a> --}}
                                    <!-- Button trigger modal -->
                                    <a href="/data-wijk-anggota-wijk-{{ $data->slug }}" class="btn btn-info" >Lihat Anggota Wijk</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Wijk</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
