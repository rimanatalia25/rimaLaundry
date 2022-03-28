<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="deletemodal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLongTitle" > Hapus data Inventaris </h5>
        <button type="button" class="close btn btn-default" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            Anda yakin akan menghapus data ini? 
        <div>
        </div>

        <br>
        <form action="{{ route('inventaris.destroy', $value->id) }}" method="POST" align="center">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger source" onclick="new PNotify({
                title: 'Hapus Berhasil!',
                text: 'Anda telah menghapus data',
                type: 'error',
                styling: 'bootstrap3'
            });">Hapus</button>
            <button data-dismiss="modal" class="btn btn-dark" type="button"> Batal
            
            </button>
        </form>
       </div>
    </div>
    </div>
</div>
