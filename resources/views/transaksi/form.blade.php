<div class="collapse" id="formLaundry">
    <div class="card-body">
        {{-- Data Pelanggan --}}
        <div class="card">
            <div class="card-body">
                <div class="row col-12">
                    <div class="form-group row col-6">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tgl">
                        </div>
                    </div>

                    <div class="form-group row col-6">
                        <label for="inputPassword" class="col-4 col-form-label">Estimasi Selesai</label>
                        <div class="col-6 ml-auto">
                            <input type="date" class="form-control ml-auto" name="bataswaktu" id="bataswaktu" value="{{ date('Y-m-d', strtotime(date('Y-m-d').'+3 day')) }}">
                        </div>
                    </div>
                </div>

                <div class="row col-12" >
                    <div class="form-group row  col-6">
                        <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember"><i class="fa-plus-square"></i></button>Nama Pelanggan/JK</label>

                        <label class="col-sm-6 col-form-label" id="nama-pelanggan" style="font-weight: normal"> - </label>
                    </div>
                    
                    <div class="form-group col-6 row">
                        <label for="" class="col-2 col-form-label"> Biodata </label>
                        <label class="col-8 ml-auto col-form-label" id="biodata-pelanggan" style="font-weight:normal"> - </label>

                    </div>
                </div>
            </div>
        </div>
        {{-- Data Pelanggan END --}}


        {{-- Modal Member --}}
        <div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Pilih Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>      
                    </div>
                    <div class="modal-body">
                        <table id='tblMember' class="table table-stripped table-compact">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($member as $b)
                                <tr>
                                    <td>{{ $i = (!isset($i)?1:++$i) }}
                                        <input type="hidden" class="idMember" name="idMember" value="{{ $b->id }}">
                                    </td>
                                    <td>{{ $b->nama }}</td>
                                    <td>{{ $b->jenis_kelamin }}</td>
                                    <td>{{ $b->tlp }}</td>
                                    <td>{{ $b->alamat }}</td>
                                    <td><button class="pilihMemberBtn" type="button">Pilih</button></td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Member END --}}


        {{-- Data Paket --}}
        <div class="card"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="tambahPaketBtn" data-toggle="modal" data-target="#modalPaket"> Tambah Cucian</button>
                    </div>
                </div>

                <div class="clearfix">&nbsp;</div>
                <div class="row">
                    <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;font-style:italic"> Belum ada Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Data Paket END --}}
        
        {{-- Modal Paket --}}
        <div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>      
                    </div>
                    <div class="modal-body">
                        <table id='tblPaket tablePaket' class="table table-stripped table-compact" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($paket as $b)
                                <tr>
                                    <td>{{ $j = (!isset($j)?1:++$j) }}
                                        <input type="hidden" class="idPaket" name="idPaket" value="{{ $b->id }}">
                                    </td>
                                    <td>{{ $b->nama_paket }}</td>
                                    <td>{{ $b->harga }}</td>
                                    <td><button class="pilihPaketBtn" type="button">Pilih</button></td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Paket END --}}

    </div>
</div>





