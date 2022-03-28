@extends('template/header')

@section('content')
    
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Barang</h2>
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

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus-square">  Tambah Barang</i>
                   </button>
 
                   <a href="member/export/xls" class="btn btn-success">
                     <i class="fa fa-file-excel-o">   Export</i>
                   </a>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                      <i class="fa fa-file-excel-o">  Import</i>
                    </button>     
                              
    
                  <!-- Modal Tambah -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          {{-- @yield('createbarang') --}}
                          <form method="POST" action="{{ 'barang' }}" > 
                              @csrf
                              <div class="form-group mb-3">
                                  <label for="barang">Nama Barang</label>
                                  <input type="text" name="barang" class="form-control" id="barang" placeholder="...">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="qty">QTY</label>
                                  <input type="number" min="0" name="qty" class="form-control" id="qty" placeholder="...">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="harga">Harga</label>
                                  <input type="text" name="harga" class="form-control" id="harga" placeholder="...">
                              </div>
                              <div class="form-group mb-3">
                                <label for="waktu">Waktu Beli</label>
                                <input type="datetime-local" name="waktu" class="form-control" id="waktu" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                  <label for="supplier">Supplier</label>
                                  <input type="text" name="supplier" class="form-control" id="supplier" placeholder="...">
                                  </div>
                                  <div class="form-group mb-3">
                                    <label for="status">Status Barang</label>
                                    <select class="custom-select" aria-label="Default select example"  name="status" id="status">
                                      <option selected disabled value>Pilih Status Barang </option>
                                      <option value="diajukan">diajukan</option>
                                      <option value="tersedia">tersedia</option>
                                      <option value="habis">habis</option>
                                    </select>
                                   </div>
                                <div class="form-group mb-3">
                                  <label for="waktu_update">Waktu Update Status</label>
                                  <input type="datetime-local" name="waktu_update" class="form-control" id="waktu_update" placeholder="...">
                                  </div>
                              <button class="btn btn-primary source" onclick="new PNotify({
                                title: 'Tambah data barang sukses!',
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


              {{-- Table View --}}

              <div class="x_content table-responsive">
                <table class="table table-hover " id="tableMember" >
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Nama Barang</th>
                      <th>QTY</th>
                      <th>Harga</th>
                      <th>Waktu Beli</th>
                      <th>Supplier</th>
                      <th>Status Barang</th>
                      <th>Waktu Update Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $key =>$value)
                    <tr>
                        <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                        <td>{{ $value->barang }}</td>
                        <td>{{ $value->qty }}</td>
                        <td>{{ $value->harga }}</td>
                        <td>{{ $value->waktu }}</td>
                        <td>{{ $value->supplier }}</td>
                        <td>{{ $value->status }}</td>
                        <td>{{ $value->waktu_update }}</td>
                        <td class="d-flex">
                            {{-- <a href="{{ url('produk/' . $value->nama_produk. '/edit') }}"><button class="btn btn-primary" type="submit">Update</button></a> --}}
                            <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" data-target="#updatemodal{{ $value->id }}" align="center">
                            </button>     
                            @include('barang.edit')

                            <button type="button" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#deletemodal{{ $value->id }}">
                            </button>  
                            @include('barang.delete')

                          </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <br>
              {{-- Table View END --}}

             

                  {{-- FILL IN THIS AREA END --}}
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    

@endsection