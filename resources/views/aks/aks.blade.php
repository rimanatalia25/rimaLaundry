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
                    <h2>Simulasi Penjualan Aksesoris</h2>
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
                  <div class="card">
                 
                    <div class="card-body">

                        <!-- start form for validation -->
                      <form id="tblSimulasiAksesoris" data-parsley-validate>
                        <div class="row">
                          <div class="col-md-6">
                            <label for="id"><b>No. Transaksi* :</b></label>
                          <input type="id" id="id" class="form-control" name="id" data-parsley-trigger="change" required /> <br>
                              
                          <label for="barang"><b> Barang dibeli* : </b> </label>
                            <select class="custom-select" aria-label="Default select example"  name="barang" id="barang">
                              <option selected disabled value>Pilih Aksesoris </option>
                              <option value="gantungan">Gantungan Kunci</option>
                              <option value="ikat">Ikat Rambut</option>
                            </select>
                   <br><br>

                          <label for="qty"><b>Jumlah Beli* :</b></label>
                          <input type="number" id="qty" class="form-control" name="qty" required min="0"/> <br>
                          </div>
                          
                          <div class="col-md-6">

                            <label for="staticEmail"><b>  Tanggal Beli* :</b></label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tgl" id="tgl" required> <br>


                            <label for="warna"><b> Warna* : </b> </label>
                            <select class="custom-select" aria-label="Default select example"  name="warna" id="warna">
                              <option selected disabled value>Pilih Warna </option>
                              <option value="Merah">Merah</option>
                              <option value="Kuning">Kuning</option>
                              <option value="Hijau">Hijau</option>
                              <option value="Biru">Biru</option>
                            </select>
                   <br><br>

                   <label for="nama"><b>Nama Pembeli* :</b></label>
                          <input type="text" id="nama" class="form-control" name="nama" required /> <br>
                           
                          </div>
                      </div>

                      <input type="hidden" readonly name="harga" id="harga">

                        <div class="form-group row">
                        <label for="diskon" class="col-sm-9 col-form-label"></label>
                        <div class="col-sm-7">
                        <input type="hidden" class="form-control" id="diskon" name="diskon" placeholder="" required>
                        </div>
                        </div>


                          <button class="btn btn-primary" id="btnSimpan" type="submit">Input</button>
                          <button class="btn btn-danger" id="btnReset" type="reset">Reset</button>



                      </form>
                      <!-- end form for validations -->
                    </div>
                </div>

                <br><br>

                <div class="card">
                   
                    <div class="card-body">
  
                      
  
                      <div class="form-group row">
                        <div class="col-12">
                          <div class="form-group row d-flex ml-1">
                          <button class="btn btn-success col-sm-2" type="button" id="sorting">Sorting</button>
                          
                          <span class="col-2"></span>
                          <input type="search" name="search" id="search" class="form-control col-sm-4">
                          <button class="btn btn-warning col-sm-2" type="button" id="btnSearch">Search</button>
                          </div>
                        </div>
                      </div>
                      
                    
                        <table class="table table-striped table-hover table-bordered" id="tblSimulasiAksesoris">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Barang</th>
                                <th>Warna</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>Nama Pelanggan</th>
                                <th>Diskon</th>
                                <th>Total Harga </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="9" align="center">Belum ada data</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
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

@push('scripts')
<script>

function insert(){
            const data = $('#tblSimulasiAksesoris').serializeArray()
            let dataSimulasiAksesoris = JSON.parse(localStorage.getItem('dataSimulasiAksesoris')) || []
            let newData = {}
            data.forEach(function(item, index){
                let name = item['name']
                let value = (name === 'id' ||
                                    name === 'qty'
                            ? parseInt(item['value']):item['value'])
                newData[name] = value
            })
                newData['diskon'] = (newData['harga'] * newData['qty']) * (calculateDiskon(newData)/100)
        newData['total'] = (newData['harga'] * newData['qty']) - newData['diskon']
            localStorage.setItem('dataSimulasiAksesoris', JSON.stringify([...dataSimulasiAksesoris, newData]))
            return newData
        }

        function showData(arr){
            let row = ''
            let totalQty = 0
            let totalHarga = 0
            let totalDiskon = 0
            let totalBayar = 0


            if(arr.length == null){
                return row = `<tr><td colspan="8" align="center">belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                totalQty += parseInt(item.qty)
                totalHarga += parseInt(item.harga)
                totalDiskon += parseInt(item.diskon)
                totalBayar += parseInt(item.total)

                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['tgl']}</td>`
                row += `<td>${item['barang']}</td>`
                row += `<td>${item['warna']}</td>`
                row += `<td>${item['harga'].toLocaleString('id-ID')}</td>`   
                row += `<td>${item['qty']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['diskon'].toLocaleString('id-ID')}</td>`
                row += `<td>${item['total'].toLocaleString('id-ID')}</td>`
                row += `</tr>`

               
            })
                row += `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="4 " align="center">Total</td>
                <td>${totalHarga.toLocaleString('id-ID')}</td>
                <td>${totalQty}</td>
                <td></td>
                <td>${totalDiskon.toLocaleString('id-ID')}</td>	
                <td colspan="2">${totalBayar.toLocaleString('id-ID')}</td>
                </tr>`
            return row
        }

    

    $(function(){
      //property
      let dataSimulasiAksesoris = JSON.parse(localStorage.getItem('dataSimulasiAksesoris')) || []
            $('#tblSimulasiAksesoris tbody').html(showData(dataSimulasiAksesoris))
  

      //Events

      //Show data
        $('#tblSimulasiAksesoris').on('submit', function(e){
            e.preventDefault()
            dataSimulasiAksesoris.push(insert())
            $('#tblSimulasiAksesoris tbody').html(showData(dataSimulasiAksesoris))
            console.log(showData(dataSimulasiAksesoris));
        })


        //Sorting
        $('#sorting').on('click', function(){
          dataSimulasiAksesoris = insertionSort(dataSimulasiAksesoris, 'id')

          $('#tblSimulasiAksesoris tbody').html(showData(dataSimulasiAksesoris))
            console.log(dataSimulasiAksesoris);
        })

        //Searching
        $('#btnSearch').on('click', function(e){
          let teksSearch = $('#search').val()
          let id = searching(dataSimulasiAksesoris, 'nama', teksSearch)
          let data = []
          if(id >= 0)
            data.push(dataSimulasiAksesoris[id]) 
          console.log(id)
          console.log(nama)
          console.log(data)
          $('#tblSimulasiAksesoris tbody').html(showData(data))
        })

      
    //Events END
  })
    

//sorting
  function insertionSort(arr, key)
  {
    let i, j, id, value;
    for (i = 1; i < arr.length; i++)
    {

      value = arr[i];
      id = arr[i][key]
      j = i - 1;
      while (j >= 0 && arr[j] [key] > id)
      {
        arr[j + 1] = arr[j];
        j = j-1;
      }
      arr[j + 1] = value;
    }
    return arr
  }

    //searching
  function searching(arr, key, teks){
    for(let i=0; i<arr.length; i++){
      if (arr[i][key]==teks)
      return i
    }
    return -1
  }


const calculateDiskon = (item) => {
            let diskon = 0
            let total = item.harga * item.qty
            let qty = parseInt(item.qty)
            if (total >= 30000 || qty >= 10) {
                diskon = 20
                return diskon
            } else {
                return diskon
            }
        }


           $('#barang').on('change', function () {
                let value = $(this).val()
                let harga = $('#harga')
                if (value == 'gantungan') {
                harga.val(5000)
                } else if (value == 'ikat') {
                harga.val(2500)
                }
            })
</script>

@endpush