<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="updatemodal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update inventaris</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
            {{-- <a href="{{ url('produk'.$value->nama_produk.'/edit') }}"> --}}

                <form method="POST" action="{{ route('inventaris.update', $value->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group mb-3">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="{{ $value->nama_barang }}" placeholder="Nama...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="merk_barang">Merk Barang</label>
                        <input type="text" name="merk_barang" class="form-control" value="{{ $value->merk_barang }}" placeholder="Alamat...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="qty">QTY</label>
                        <input type="text" name="qty" class="form-control" value="{{ $value->qty }}" placeholder="No. Telp...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="kondisi">kondisi</label>
                        <select class="custom-select" value="{{ $value->kondisi }}" aria-label="Default select example"  name="kondisi" id="kondisi">
                            <option selected disabled value="{{ $value->kondisi }}">{{ $value->kondisi }}</option>
                            <option selected disabled value>Pilih kondisi Barang </option>
                            <option value="layak_pakai">Layak Pakai</option>
                            <option value="rusak_ringan">Rusak Ringan</option>
                            <option value="rusak_berat">Rusak Berat</option>
                        </select>
                       </div>
                       <div class="form-group mb-3">
                        <label for="tanggal_pengadaan">Tanggal Perubahan</label>
                        <input type="text" name="tanggal_pengadaan" value="{{ $value->tanggal_pengadaan }}" class="form-control" id="tanggal_pengadaan" placeholder="...">
                      </div>
                    <br>
                    <button class="btn btn-success source" onclick="new PNotify({
                        title: 'Ubah inventaris sukses',
                        text: 'Anda berhasil mengubah data!',
                        type: 'success',
                        styling: 'bootstrap5'
                    });">Ubah data</button>
                  </form></a>

        </div>
    </div>
    </div>
</div>
