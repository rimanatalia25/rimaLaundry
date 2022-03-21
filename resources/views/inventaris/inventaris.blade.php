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
                    <h2>Data Inventaris</h2>
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
                    Tambah Inventaris
                    </button>
                  

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Inventaris</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- @yield('createbarang') --}}
                            <form method="POST" action="{{ 'inventaris' }}" id="#tableInventaris"> 
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="merk_barang">Merk Barang</label>
                                    <input type="text" name="merk_barang" class="form-control" id="merk_barang" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="qty">QTY</label>
                                    <input type="text" name="qty" class="form-control" id="qty" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kondisi">Kondisi</label>
                                    <select class="custom-select" aria-label="Default select example"  name="kondisi" id="kondisi">
                                      <option selected disabled value>Pilih Jenis Paket </option>
                                      <option value="layak_pakai">Layak Pakai</option>
                                      <option value="rusak_ringan">Rusak Ringan</option>
                                      <option value="rusak_berat">Rusak Berat</option>
                                    </select>
                                   </div>
                                <div class="form-group mb-3">
                                    <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
                                    <input type="date" name="tanggal_pengadaan" class="form-control" id="tanggal_pengadaan" placeholder="...">
                                </div>
                                <button class="btn btn-primary source" onclick="new PNotify({
                                  title: 'Pengajuan sukses!',
                                  text: 'Anda berhasil menambahkan data.',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });">Tambah</button>
                              </form>
                        </div>
                        </div>
                    </div>
                    </div>
                
                {{-- Modal tambah end --}}
      <div class="x_content">
        <table class="table table-hover" id="tableInventaris">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Barang</th>
              <th>Merk Barang</th>
              <th>QTY</th>
              <th>Kondisi</th>
              <th>Tanggal Pengadaan</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($data as $key =>$value)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $value->nama_barang }}</td>
                <td>{{ $value->merk_barang }}</td>
                <td>{{ $value->qty }}</td>
                <td>{{ $value->kondisi }}</td>
                <td>{{ $value->tanggal_pengadaan }}</td>
                <td class="d-flex">
                    {{-- <a href="{{ url('produk/' . $value->nama_produk. '/edit') }}"><button class="btn btn-primary" type="submit">Update</button></a> --}}
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updatemodal{{ $value->id }}">
                        Update
                    </button>     
                    @include('inventaris.edit')

                    <form action="{{ route('inventaris.destroy', $value->id) }}" method="POST">
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