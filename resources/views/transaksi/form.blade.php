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
                            <input type="date" class="form-control ml-auto" name="batas_waktu" value="{{ date('Y-m-d', strtotime(date('Y-m-d').'+3 day')) }}">
                        </div>
                    </div>
                </div>

                <div class="row col-12" >
                    <div class="form-group row  col-6">
                        <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember"><i class="fa fa-plus-square"></i></button>Nama Pelanggan/JK</label>

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
                                        <input type="hidden" class="idMember" name="id_member">
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
                    <table id="tblTransaksi" class="table table-sm table-compact table-striped table-bordered bulk_action">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;font-style:italic">Belum ada Data</td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr valign="bottom">
                                <td width="" colspan="3" align="right">Jumlah bayar</td>
                                <td><span id="subtotal">0</span></td>
                                <td rowspan="4">
                                    <label for="">Pembayaran</label>
                                    <input type="text" class="form-control" name="bayar" id="" style="width: 170px" value="">
                                    <div>
                                        <button class="btn btn-primary" type="submit" style="margin-top: 10px;width=170px">Bayar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Diskon</td>
                                <td><input type="number" value="0" id="diskon" name="diskon" style="width:140px"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Pajak <input type="number" value="0" min="0" class="qty" name="pajak" id="pajak-persen" size="2" style="width:40px"></td>
                                <td><span id="pajak-harga">0</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Biaya Tambahan</td>
                                <td><input type="number" name="biaya_tambahan" style="width: 140px" value="0"></td>
                            </tr>
                            <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                                <td colspan="3" align="right">Total bayar akhir</td>
                                <td><span id="total">0</span></td>
                            </tr>
                        </tfoot>
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
                        <table id='tblPaket' class="table table-stripped table-compact" >
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
                                        <input type="hidden" class="idPaket" value="{{ $b->id }}">
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

        {{-- Tabel Penampungan --}}

        {{-- Tabel penampungan END --}}

    </div>
</div>





