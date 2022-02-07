<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="updatemodal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
            {{-- <a href="{{ url('produk'.$value->nama_produk.'/edit') }}"> --}}

                <form method="POST" action="{{ route('member.update', $value->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $value->nama }}" placeholder="Nama...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $value->alamat }}" placeholder="Alamat...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select" aria-label="Default select example"  name="jenis_kelamin" id="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tlp">Nomor Telepon</label>
                        <input type="text" name="tlp" class="form-control" value="{{ $value->tlp }}" placeholder="No. Telp...">
                    </div>
                    
                    <br>
                    <button class="btn btn-success source" onclick="new PNotify({
                        title: 'Ubah member sukses',
                        text: 'Anda berhasil mengubah data!',
                        type: 'success',
                        styling: 'bootstrap5'
                    });">Ubah data</button>
                  </form></a>

        </div>
    </div>
    </div>
</div>
