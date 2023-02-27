@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="/ubah-sintua-{{ $sintua->id }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $sintua->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="">Wijk</label>
                                <select name="wijk_id" class="form-control">
                                    <option value="{{ $sintua->wijk->id }}">{{ $sintua->wijk->nama }}</option>
                                    <option value="" disabled>-------------</option>
                                    @foreach ($wijk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="simpan" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
