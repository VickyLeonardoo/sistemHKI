{{-- Modal Hapus Data Pendeta --}}

@foreach ($pendeta as $data)
<div class="modal fade" id="modal-danger{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/hapus-data-pendeta-{{ $data->id }}">
            @csrf
        <div class="modal-body">
          <p>ingin Menghapus Pendeta {{ $data->nama }} ?</p>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-outline-light" value="Hapus"></input>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endforeach


