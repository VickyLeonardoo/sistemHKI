@extends('bph.partials.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                </div>
                <div class="col-md-12">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ url('bph/update/profile') }}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label for="">Nama:</label>
                                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email:</label>
                                            <input type="text" readonly class="form-control" value="{{ auth()->user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </form>

                                    {{-- <div id="piechart" style="width:auto; height: 400px;"></div> --}}
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ url('bph/update/password') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Password:</label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konfirmasi Password:</label>
                                            <input type="password" name="password_confirmatin" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
