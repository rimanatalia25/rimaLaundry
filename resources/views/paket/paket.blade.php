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
                    <h2>Pilih paket</h2>
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
                   <i class="fa fa-plus-square">  Tambah paket</i>
                  </button>

                  <a href="paket/export/xls" class="btn btn-success">
                    <i class="fa fa-file-excel-o">   Export</i>
                  </a>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                    <i class="fa fa-file-excel-o">  Import</i>
                  </button>    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah paket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- @yield('createbarang') --}}
                            <form method="POST" action="{{ 'paket' }}"> 
                                @csrf
                                <div class="form-group mb-3">
                                  <label for="id_outlet">Id Outlet</label>
                                  <select class="custom-select" aria-label="Default select example" name="id_outlet" id="id_outlet">
                                      <option selected disabled value>Select Id Outlet</option>
                                      @foreach($outlet as $item)
                                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                      @endforeach
                                  </select>
                                </div>
                                <div class="form-group mb-3">
                                  <label for="jenis">Jenis Paket</label>
                                  <select class="custom-select" aria-label="Default select example"  name="jenis" id="jenis">
                                    <option selected disabled value>Pilih Jenis Paket </option>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="selimut">Selimut</option>
                                    <option value="bed_cover">Bed Cover</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="kain">Kain</option>
                                  </select>
                                 </div>
                                <div class="form-group mb-3">
                                    <label for="nama_paket">Nama Paket</label>
                                    <input type="text" name="nama_paket" class="form-control" id="nama_paket" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                  <label for="harga">Harga</label>
                                  <input type="text" name="harga" class="form-control" id="harga" placeholder="...">
                              </div>
                                <button class="btn btn-primary source" onclick="new PNotify({
                                  title: 'Tambah paket sukses',
                                  text: 'Anda berhasil menambahkan data!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Tambah data</button>
                              </form>
                        </div>
                        </div>
                    </div>
                    </div>
                
                {{-- Modal tambah end --}}

                {{-- Modal Impor --}}

              <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Import Data Paket</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form method="POST" action="/paket/import" enctype="multipart/form-data">
                      @csrf

                      <div class="card-body">
                        <div class="form-group ">
                          <label for="jenis">File Excel</label>
                          <input class="form-control" type="file" name="import" id="import" >
                        </div>
                      </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                      <button type="submit" class="btn btn-primary" id="btn-submit"> Upload </button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
              {{-- Modal Impor END --}}

              {{-- Menampilkan Tabel --}}
              <div class="x_content">
                <table class="table table-hover" id="tablePaket">
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Id Outlet</th>
                      <th>Jenis</th>
                      <th>Nama Paket</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $key =>$value)
                    <tr>
                        <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                        <td>{{ $value->outlet == null ? '-' : $value->outlet->nama }}</td>
                        <td>{{ $value->jenis }}</td>
                        <td>{{ $value->nama_paket }}</td>
                        <td>{{ $value->harga }}</td>
                        <td class="d-flex">
                            {{-- <a href="{{ url('produk/' . $value->nama_produk. '/edit') }}"><button class="btn btn-primary" type="submit">Update</button></a> --}}
                            <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" data-target="#updatemodal{{ $value->id }}" align="center">
                            </button>     
                            @include('paket.edit')

                            <button type="button" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#deletemodal{{ $value->id }}" align="center">
                            </button>  
                            @include('paket.delete')

                          </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            {{-- Menampilkan Table END --}}

                  {{-- FILL IN THIS AREA END --}}
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    

@endsection