@extends('template/header')

@section('content')
    
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Member</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Member</h2>
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
                                Tambah Member
                                </button>
                              
    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- @yield('createbarang') --}}
                                        <form method="POST" action="{{ 'member' }}" > 
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama" placeholder="...">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="...">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="custom-select" aria-label="Default select example"  name="jenis_kelamin" id="jenis_kelamin">
                                                  <option selected disabled value>Pilih Jenis Kelamin </option>
                                                  <option value="L">Laki-laki</option>
                                                  <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="tlp">Nomor Telepon</label>
                                                <input type="text" name="tlp" class="form-control" id="tlp" placeholder="...">
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
                            
                            {{-- Modal tambah end --}}
                  <div class="x_content table-responsive">
                    <table class="table table-hover " id="tableMember" >
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>L/P</th>
                          <th>No. Telp.</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($data as $key =>$value)
                        <tr>
                            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->alamat }}</td>
                            <td>{{ $value->jenis_kelamin }}</td>
                            <td>{{ $value->tlp }}</td>
                            <td class="d-flex">
                                {{-- <a href="{{ url('produk/' . $value->nama_produk. '/edit') }}"><button class="btn btn-primary" type="submit">Update</button></a> --}}
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updatemodal{{ $value->id }}">
                                    Update
                                </button>     
                                @include('member.edit')

                                <form action="{{ route('member.destroy', $value->id) }}" method="POST">
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



                  {{-- Ekspor --}}
                  <div style="margin-bottom: 20px; align:center">
                    <a type="button" class="btn btn-light" id="btn-expor-xls" href="member/export/xls"><i class="fa fa-file-excel-o" style="color: forestgreen"></i> Expor XLS</a>
                    <a type="button" class="btn btn-light" id="btn-expor-xls"><i class="fa fa-file-pdf-o" style="color:tomato"></i> Expor PDF</a>
                  </div>
                  {{-- Ekspor END --}}




                  {{-- FILL IN THIS AREA END --}}
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    

@endsection