<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="updatemodal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
            {{-- <a href="{{ url('produk'.$value->nama_produk.'/edit') }}"> --}}

        <form method="POST" action="{{ route('barang.update', $value->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group mb-3">
                <label for="barang">Nama Barang</label>
                <input type="text" name="barang" class="form-control" id="barang" value="{{ $value->barang }}" placeholder="...">
            </div>
            <div class="form-group mb-3">
                <label for="qty">QTY</label>
                <input type="number" min="0" name="qty" class="form-control" id="qty" value="{{ $value->qty }}" placeholder="...">
            </div>
            <div class="form-group mb-3">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" value="{{ $value->harga }}" placeholder="...">
            </div>
            <div class="form-group mb-3">
                <label for="waktu">Waktu Beli</label>
                <input type="datetime-local" name="waktu" class="form-control" id="waktu" value="{{ $value->waktu }}" placeholder="...">
                </div>
                <div class="form-group mb-3">
                <label for="supplier">Supplier</label>
                <input type="text" name="supplier" class="form-control" id="supplier" value="{{ $value->supplier }}" placeholder="...">
                </div>
                <div class="form-group mb-3">
                    <select class="custom-select" value="{{ $value->status }}" aria-label="Default select example"  name="status" id="status">
                    <option selected disabled value="{{ $value->status }}">{{ $value->status }}</option>
                    <option value="diajukan">diajukan</option>
                    <option value="tersedia">tersedia</option>
                    <option value="habis">habis</option>
                    </select>
                    </div>
                <div class="form-group mb-3">
                <label for="waktu_update">Waktu Update Status</label>
                <input type="datetime-local" name="waktu_update" class="form-control" id="waktu_update" value="{{ $value->waktu_update }}" placeholder="...">
                </div>
            <br>
            <button class="btn btn-success source" onclick="new PNotify({
                title: 'Ubah barang sukses',
                text: 'Anda berhasil mengubah data!',
                type: 'success',
                styling: 'bootstrap5'
            });">Ubah data</button>
            </form></a>

        </div>
    </div>
    </div>
</div>
