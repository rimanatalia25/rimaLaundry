<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="updatemodal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Absen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
            {{-- <a href="{{ url('produk'.$value->nama_produk.'/edit') }}"> --}}

                <form method="POST" action="{{ route('absen.update', $value->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group mb-3">
                                  <label for="nama">Nama Karyawan</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="{{ $value->nama }}"  placeholder="...">
                              </div>
                              <div class="form-group mb-3">
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" value="{{ $value->tgl_masuk }}"  placeholder="...">
                                </div>
                                <!-- <div class="form-group mb-3">
                                <label for="waktu_masuk">Waktu Masuk</label>
                                <input type="time" name="waktu_masuk" class="form-control" id="waktu_masuk" value="{{ $value->waktu_masuk }}"  placeholder="...">
                                </div> -->
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select class="custom-select" aria-label="Default select example"  name="status" id="status">
                                        
                                    <option selected disabled value="{{ $value->status }}">{{ $value->status }}</option>
                                      <option value="masuk">masuk</option>
                                      <option value="sakit">sakit</option>
                                      <option value="cuti">cuti</option>
                                    </select>
                                   </div>
                    
                    <input type="hidden" value="UPDATE">
                    <button class="btn btn-success source" onclick="new PNotify({
                                  title: 'Update Berhasil!',
                                  text: 'Anda berhasil mengupdate data.',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Update</button> 

                  </form></a>

        </div>
    </div>
    </div>
</div>
