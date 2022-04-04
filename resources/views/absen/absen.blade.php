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
                    <h2>Absensi Kerja Karyawan</h2>
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
                    <i class="fa fa-plus-square">  Tambah Data</i>
                   </button>
 
                   <a href="absen/export/xls" class="btn btn-success">
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
                          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="{{ 'absen' }}" > 
                              @csrf
                              <div class="form-group mb-3">
                                  <label for="nama">Nama Karyawan</label>
                                  <input type="text" name="nama" class="form-control" id="nama" placeholder="...">
                              </div>
                              <div class="form-group mb-3">
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                <label for="waktu_masuk">Waktu Masuk</label>
                                <input type="time" name="waktu_masuk" class="form-control" id="waktu_masuk" placeholder="...">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select class="custom-select" aria-label="Default select example"  name="status" id="status">
                                      <option selected disabled value>Pilih Status Masuk </option>
                                      <option value="masuk">masuk</option>
                                      <option value="sakit">sakit</option>
                                      <option value="cuti">cuti</option>
                                    </select>
                                   </div>
                              <div class="form-group mb-3">
                                <label for="waktu_selesai">Waktu Selesai Kerja</label>
                                <input type="time" type="hidden" name="waktu_selesai" class="form-control" id="waktu_selesai" placeholder="...">
                                </div>
                              <button class="btn btn-primary source" onclick="new PNotify({
                                title: 'Tambah data kerja sukses!',
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

              <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Import Data Absen</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form method="POST" action="/absen/import" enctype="multipart/form-data">
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
                      <!-- <button type="submit" class="btn btn-primary" id="btn-submit"> Upload </button> -->
                      <button type="submit" id="btn-submit" class="btn btn-primary source" onclick="new PNotify({
                                  title: 'Upload data Excel Berhasil!',
                                  text: 'Anda berhasil menambahkan data dari excel',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });">Upload</button> 
                    </div>
                  </div>
                </div>
              </form>
              </div>
              {{-- Modal Impor END --}}


              {{-- Table View --}}

              <div class="x_content table-responsive">
                <table class="table table-hover " id="tableMember" >
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Nama Karyawan</th>
                      <th>Tanggal Masuk</th>
                      <th>Waktu Masuk</th>
                      <th>Status</th>
                      <th>Waktu Selesai Kerja</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $key =>$value)
                    <tr>
                        <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->tgl_masuk }}</td>
                        <td>{{ $value->waktu_masuk }}</td>
                        <td>
                        <form action="{{ route('absen.update', $value->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="_method" value="PATCH">

                                            <input type="hidden" name="id" id="id" value="{{ $value->id }}">
                                            <input type="hidden" name="nama" id="nama" value="{{ $value->nama }}">
                                            <select value="{{ $value->status }}" class="custom-select" name="status" id="status" onchange="this.form.submit();">
                                                {{-- <option selected disabled value>Pilih Status </option> --}}
                                                <option value="{{ $value->status }}">{{ $value->status }}</option>
                                                <option value="masuk">masuk</option>
                                                <option value="sakit">sakit</option>
                                                <option value="cuti">cuti</option>
                                            </select>
                                        </form>
                                    </td>
                        <td>{{ $value->waktu_selesai }}</td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" data-target="#updatemodal{{ $value->id }}" align="center">
                            </button>     
                            @include('absen.edit')

                            <button type="button" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#deletemodal{{ $value->id }}">
                            </button>  
                            @include('absen.delete')

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