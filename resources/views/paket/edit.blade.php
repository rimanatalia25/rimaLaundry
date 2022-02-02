<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="updatemodal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update paket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
            {{-- <a href="{{ url('produk'.$value->nama_produk.'/edit') }}"> --}}

                <form method="POST" action="{{ route('paket.update', $value->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group mb-3">
                        <label for="nama">Id Outlet</label>
                        <select class="custom-select"  aria-label="Default select example" name="nama" id="nama">
                            
                            @foreach($outlet as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group mb-3">
                        <label for="jenis">Jenis Paket</label>
                        <select class="custom-select" value="{{ $value->jenis }}" aria-label="Default select example"  name="jenis" id="jenis">
                            <option selected disabled value="{{ $value->jenis }}">{{ $value->jenis }}</option>
                        
                          <option value="kiloan">Kiloan</option>
                          <option value="selimut">Selimut</option>
                          <option value="bed_cover">Bed Cover</option>
                          <option value="kaos">Kaos</option>
                          <option value="kain">Kain</option>
                        </select>
                       </div>
                       <div class="form-group mb-3">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" name="nama_paket" value="{{ $value->nama_paket }}" class="form-control" id="nama_paket" placeholder="...">
                    </div>
                    <div class="form-group mb-3">
                      <label for="harga">Harga</label>
                      <input type="text" name="harga" value="{{ $value->harga }}" class="form-control" id="harga" placeholder="...">
                    </div>
                    
                    <br>
                    <button class="btn btn-primary source" onclick="new PNotify({
                        title: 'Ubah paket sukses',
                        text: 'Anda berhasil mengubah data!',
                        type: 'success',
                        styling: 'bootstrap5'
                    });">Ubah data</button>
                  </form></a>

        </div>
    </div>
    </div>
</div>
