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
                    <h2>Simulasi Transaksi Laundry</h2>
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
                    {{-- <div class="card-header">
                        <h3>Gaji Karyawan</h3>
                    </div> --}}
                    <div class="card-body">

                        <!-- start form for validation -->
                      <form id="tblSimulasiTransaksi" data-parsley-validate>
                        <div class="row">
                          <div class="col-md-6">
                            <label for="id"><b>ID Karyawan* :</b></label>
                          <input type="id" id="id" class="form-control" name="id" data-parsley-trigger="change" required /> <br>
                              
                          <label for="barang"><b> Nama Barang* : </b> </label>
                            <select class="custom-select" aria-label="Default select example"  name="barang" id="barang">
                              <option selected disabled value>Pilih Barang </option>
                              <option value="detergent">Detergent</option>
                              <option value="pewangi">Pewangi</option>
                              <option value="detergent_sepatu">Detergent Sepatu</option>
                            </select>
                   <br><br>

                          <label for="qty"><b>Jumlah* :</b></label>
                          <input type="number" id="qty" class="form-control" name="qty" required min="0"/> <br>
                          </div>
                          
                          <div class="col-md-6">

                            <label for="staticEmail"><b>  Tanggal Beli* :</b></label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tgl" required> <br>


                            <label for="harga"><b>Harga Barang* :</b></label>
                            <input type="number" id="harga" class="form-control" name="harga" required /> <br><br><br>

                            <label><b>Jenis Pembayaran* :</b> </label>
                         
                              Cash    :
                              <input type="radio" class="flat" name="bayar" id="bayar" value="Cash" checked="" required /> 
                              E-Money    :
                              <input type="radio" class="flat" name="bayar" id="bayar" value="E-Money" />
                           <br> <br><br>

                           
            

                            

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
                          {{-- <a href="gaji/export/xls" class="btn btn-success">
                            <i class="fa fa-file-excel-o">   Export</i>
                          </a> --}}
                          <span class="col-2"></span>
                          <input type="search" name="search" id="search" class="form-control col-sm-4">
                          <button class="btn btn-warning col-sm-2" type="button" id="btnSearch">Search</button>
                          </div>
                        </div>
                      </div>
                      
                    
                        <table class="table table-striped table-hover table-bordered" id="tblSimulasiTransaksi">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                                <th>Jenis Bayar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="8" align="center">Belum ada data</td>
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
    const data = $('#tblSimulasiTransaksi').serializeArray()
    let dataSimulasiTransaksi = JSON.parse(localStorage.getItem('dataSimulasiTransaksi')) || []
    let newData = {}
    data.forEach(function(item, index){
        let name = item['name']
        let value = (name === 'id' ||
                    name === 'jumlah'    
                    ? Number(item['value']):item['value'])
        newData[name] = value
    })
        newData['diskon'] = calculateDiskon(newData['harga'],
                                                                   newData['jumlah'])
newData['total_harga'] = (newData['harga'] * newData['jumlah']) - newData['diskon']
    localStorage.setItem('dataSimulasiTransaksi', JSON.stringify([...dataSimulasiTransaksi, newData]))
    return newData
}

    
    function showData(arr){
        let row = ''
        let totalQty = 0
        let totalHarga = 0
        let totalDiskon = 0
        let totalAll = 0

      if(arr.length == null){
        return row = `<tr><td colspan="8">Belum ada data</td></tr>` 
    }

    arr.forEach(function(item, index){
        totalQty += parseInt(item.qty)
        totalHarga += parseInt(item.harga)
        totalDiskon += parseInt(item.diskon)
        totalAll += parseInt(item.total)
      row += `<tr>`
      row += `<td>${item['id']}</td>`
      row += `<td>${item['tgl']}</td>`
      row += `<td>${item['barang']}</td>`
      row += `<td>${item['harga']}</td>`
      row += `<td>${item['qty']}</td>`
      row += `<td>${item['diskon']}</td>`
      row += `<td>${item['total']}</td>`
      row += `<td>${item['bayar']}</td>`
      row += `</tr>`
    })

    row += `<tr style="background:black;color:white;font-weight:bold;font-size:1em">`
    row +=`<td colspan="3 " align="center">Total</td>`
    row += `<td>${totalHarga}</td>`
    row += `<td>${totalQty}</td>`
    row += `<td>${totalDiskon}</td>`
    row += `<td colspan="2">${totalAll}</td>`
    row += `</tr>`
    return row
    // row += `<tr>`
    // row += `<td colspan ="3">Total</td>`
    // row += `<td>${totalHarga.toLocaleString('id-ID')}</td>`
    // row += `<td>${totalQty.toLocaleString('id-ID')}</td>`
    // row += `<td>${totalDiskon.toLocaleString('id-ID')}</td>`
    // row += `<td colspan="2">${TotalAll.toLocaleString('id-ID')}</td>`
    // row += `</tr>`
    // return row
    }
    

    $(function(){
      //property
      let dataSimulasiTransaksi = []

      //Events
        $('#tblSimulasiTransaksi').on('submit', function(e){
            e.preventDefault()
            dataSimulasiTransaksi.push(insert())
            $('#tblSimulasiTransaksi tbody').html(showData(dataSimulasiTransaksi))
            console.log(showData(dataSimulasiTransaksi));
        })

        $('#sorting').on('click', function(){
          dataSimulasiTransaksi = insertionSort(dataSimulasiTransaksi, 'id')

          $('#tblSimulasiTransaksi tbody').html(showData(dataSimulasiTransaksi))
            console.log(dataSimulasiTransaksi);
        })

        $('#btnSearch').on('click', function(e){
          let teksSearch = $('#search').val()
          let id = searching(dataSimulasiTransaksi, 'id', teksSearch)
          let data = []
          if(id >= 0)
            data.push(dataSimulasiTransaksi[id]) 
          console.log(id)
          console.log(data)
          $('#tblSimulasiTransaksi tbody').html(showData(data))
        })

        // $('#barang').on('change', function(){
        //     const value = $(this).val()
        //     switch (value){
        //         case "detergen":
        //             dataSimulasiTransaksi.barang = "Detergen"
        //             dataSimulasiTransaksi.harga = 15000
        //             break;
        //         case "pewangi":
        //             dataSimulasiTransaksi.barang = "Pewangi"
        //             dataSimulasiTransaksi.harga = 10000
        //             break;
        //         case "detergen_sepatu":
        //             dataSimulasiTransaksi.barang = "Detergen Sepatu"
        //             dataSimulasiTransaksi.harga = 25000
        //             break;
        //     }

        //     $('#harga').text(formatNumber(dataSimulasiTransaksi.harga))
        // })

        $('#barang').on('change', function(){
            let barang  = $(this).val()
            if (barang == 'detergent'){
                $('#harga').attr('readonly', true)
                $('#harga').val(15000)
            }else if (barang == 'pewangi'){
                $('#harga').attr('readonly', true)
                $('#harga').val(10000)
            }else if (barang == 'detergent_sepatu'){
                $('#harga').attr('readonly', true)
                $('#harga').val(25000)
            }
        })
    //Events END
  })
    

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

  function searching(arr, key, teks){
    for(let i=0; i<arr.length; i++){
      if (arr[i][key]==teks)
      return i
    }
    return -1
  }
  const calculateDiskon = (harga, jumlah) => {
           
           total_harga = harga * jumlah
           diskon1 = 0.15 * total_harga
            let calculateDiskon = total_harga > 50000? diskon1 : 0
            return calculateDiskon
        }

  // const searching = (arr, text) => {
  //   if (text !== ''){
  //     let data = []
  //     for (let index = 0; index< arr.length; index++){
  //       for (const key in arr[index]) {
  //         const value = arr[index] [key].toString(
  //           for (let x = 0; x < value.length; x++){
  //             if (value.substring(x, x + text.length).toLowerCase() == text.toLowerCase()){
  //               data.push(dataSimulasiTransaksi[index])
  //               break;
  //             }
  //           }
  //         )
  //       }
  //     }
  //   }
  // }

</script>

@endpush