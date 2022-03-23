@extends('template/header')

@section('content')
    
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Penjemputan Laundry</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  {{-- FILL IN THIS AREA --}}

                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-plus-square"> Tambah Penjemputan</i>
                    </button>
                    <a href="penjemputan/export/xls" class="btn btn-success">
                        <i class="fa fa-file-excel-o">   Export</i>
                    </a>
                  

                    

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Penjemputan Laundry</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- @yield('createbarang') --}}
                                <form method="POST" action="{{ 'penjemputan' }}" > 
                                    @csrf
                                  
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama Pelanggan</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="alamat">Alamat Pelanggan</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="...">
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="tlp">No. HP Pelanggan</label>
                                        <input type="text" name="tlp" class="form-control" id="tlp" placeholder="...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="petugas">Petugas Penjemputan</label>
                                        <input type="text" name="petugas" class="form-control" id="petugas" placeholder="...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jenis_kelamin">Status</label>
                                        <select class="custom-select" aria-label="Default select example"  name="jenis_kelamin" id="jenis_kelamin">
                                            <option selected disabled value>Pilih Status </option>
                                            <option value="tercatat">Tercatat</option>
                                            <option value="penjemputan">Penjemputan</option>
                                            <option value="selesai">Selesai</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary source" onclick="new PNotify({
                                        title: 'Tambah member sukses!',
                                        text: 'Anda berhasil menambahkan data.',
                                        type: 'info',
                                        styling: 'bootstrap3'
                                    });">Tambah</button>
                                    </form>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    
                    {{-- Modal tambah end --}}

                    {{-- Modal Impor --}}

                    {{-- <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <div class="modal-body">
                            <form method="POST" action="/member/import" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                <label for="jenis">File Excel</label>
                                <input type="file" name="import" id="import">
                                </div>
                            </div>
                            </div>
                            
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLose </button>
                            <button type="submit" class="btn btn-primary" id="btn-submit"> Upload </button>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div> --}}
                    {{-- Modal Impor END --}}


                        <div class="x_content table-responsive">
                            <table class="table table-hover " id="tableMember" >
                            <thead>
                                <tr>
                                <th>No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat Pelanggan</th>
                                <th>No. HP Pelanggan</th>
                                <th>Petugas Penjemputan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $key =>$value)
                                <tr>
                                    <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->tlp }}</td>
                                    <td>{{ $value->petugas }}</td>
                                    <td>{{ $value->status }}</td>
                                    <td class="d-flex">
                                        {{-- <a href="{{ url('produk/' . $value->nama_produk. '/edit') }}"><button class="btn btn-primary" type="submit">Update</button></a> --}}
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updatemodal{{ $value->id }}">
                                            Update
                                        </button>     
                                        @include('penjemputan.edit')

                                        <form action="{{ route('penjemputan.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger source" onclick="new PNotify({
                                            title: 'Hapus Berhasil!',
                                            text: 'Anda telah menghapus data',
                                            type: 'error',
                                            styling: 'bootstrap3'
                                        });">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>

                   
                  {{-- FILL IN THIS AREA END --}}
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    

@endsection