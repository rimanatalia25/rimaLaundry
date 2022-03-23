@extends('template/header')

@section('content')
    
<!-- page content -->

    {{-- Page Header --}}
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Gaji Karyawan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
    {{-- PAge Header END --}}


    {{-- Main COntent --}}
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
                      <form id="formKaryawan" data-parsley-validate>
                        <div class="row">
                          <div class="col-md-6">
                            <label for="id"><b>ID Karyawan* :</b></label>
                          <input type="id" id="id" class="form-control" name="id" data-parsley-trigger="change" required /> <br>
                              
                          <label><b>Jenis Kelamin* :</b> </label>
                          <p>
                              Laki-laki:
                              <input type="radio" class="flat" name="jk" id="jk" value="L" checked="" required /> 
                              Perempuan:
                              <input type="radio" class="flat" name="jk" id="jk" value="P" />
                          </p> <br>

                          <label for="anak"><b>Jumlah Anak* :</b></label>
                          <input type="number" value="0" id="anak" class="form-control" name="anak" required readonly value="0"/> <br>

                          </div>
                          
                          <div class="col-md-6">
                            <label for="nama"><b>Nama Karyawan* :</b></label>
                          <input type="text" id="nama" class="form-control" name="nama" required /> <br>

                            <label for="status"><b> Status* : </b> </label>
                            <select class="custom-select" aria-label="Default select example"  name="status" id="status">
                              <option selected disabled value>Pilih Status </option>
                              <option value="single">Single</option>
                              <option value="couple">Couple</option>
                            </select> <br> <br>
                           
                            <label for="staticEmail"><b> Mulai Bekerja* :</b></label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="kerja" required> <br>
                              
                          </div>
                      </div>
                          <button class="btn btn-primary" id="btnSimpan" type="submit">Submit</button>
                          <button class="btn btn-danger" id="btnReset" type="reset">Reset</button>



                      </form>
                      <!-- end form for validations -->
                    </div>
                </div>

                <br><br>

                <div class="card">
                  <div class="card-header">
                      <h3>Data</h3>
                  </div>
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
                    
                  
                      <table class="table table-striped table-hover table-bordered" id="tblKaryawan">
                          <thead>
                            <tr>
                              <th>ID Karyawan</th>
                              <th>Nama Karyawan</th>
                              <th>Jenis Kelamin</th>
                              <th>Status Menikah</th>
                              <th>Jumlah Anak</th>
                              <th>Mulai Bekerja</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="6" align="center">Belum ada data</td>
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
    {{-- Main COntent END --}}

<!-- /page content -->

    

@endsection

@push('scripts')
<script>

    // initialize
    const GAJI_AWAL = 2000000
    const TUNJ_MENIKAH = 250000
    const TUNJ_ANAK = 150000
    const TUNJ_JML_ANAK = 2
    const TUNJ_TAHUNAN = 150000

    let dataGaji = JSON.parse(localStorage.getItem('dataGaji')) || []
    let totalGajiAwal = totalTunjangan = totalGaji = 0

    function insert(dataGaji){
      const data = $('#formKaryawan').serializeArray()
      let newData = {}
      data.forEach(function(item, index){
        let name = item['name']
        let value = (name === 'id' ||
                    name === 'anak'
                    ? Number (['value']):item['value'])
        newData[name] = value
      })

      newData['gajiAwal'] = GAJI_AWAL
      newData['tunjangan'] = hitungTunjangan(
        newData['kerja'],
        newData['status'],
        newData['anak']
      )
        newData['totalGaji'] = GAJI_AWAL + newData['tunjangan']

        localStorage.setItem('dataGaji', JSON.stringify([ ... dataGaji, newData]))
      return newData;
    }

    function _calculateAGe(date){
      date = new Date(date)
      let ageDifMS = Date.now() - date.getTime()
      let ageDate = new Date(ageDifMS)
      return Math.abs(ageDate.getUTCFullYear() - 1970)
    }

    

    function hitungTunjangan(kerja, status, anak){
      //Tunjangan Tahunan
      let tunjKerja = _calculateAGe(kerja) * TUNJ_TAHUNAN

      //Tunjangan Pasangan
      let tunjPasangan = status === "single"? 0: TUNJ_MENIKAH

      //Tunjangan anak
      let  tunjAnak = anak > 2? TUNJ_ANAK * 2: TUNJ_ANAK * anak
      
      return tunjKerja + tunjPasangan + tunjAnak
    }

    function showData(arr){
      let row = ''
      if(arr.length == null){
        return row = `<tr><td colspan="3">Belum ada data</td></tr>` 
    }
    arr.forEach(function(item, index){
      row += `<tr>`
      row += `<td>${item['id']}</td>`
      row += `<td>${item['nama']}</td>`
      row += `<td>${item['jk']}</td>`
      row += `<td>${item['status']}</td>`
      row += `<td>${item['anak']}</td>`
      row += `<td>${item['kerja']}</td>`
      row += `<td>${item['gajiAwal'].toLocaleString('id-ID')}</td>`
      row += `<td>${item['tunjangan'].toLocaleString('id-ID')}</td>`
      row += `<td>${item['totalGaji'].toLocaleString('id-ID')}</td>`
      row += `</tr>`

      totalGajiAwal += item['gajiAwal']
      totalTunjangan += item ['tunjangan']
      totalGaji += item['totalGaji']
    })

    row += `<tr>`
    row += `<td colspan ="6">Total</td>`
    row += `<td>${totalGajiAwal.toLocaleString('id-ID')}</td>`
    row += `<td>${totalTunjangan.toLocaleString('id-ID')}</td>`
    row += `<td>${totalGaji.toLocaleString('id-ID')}</td>`
    row += `</tr>`
    return row
    }







    $(function(){
      //property
      let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan'))|| []




      //Events
        $('#formKaryawan').on('submit', function(e){
            e.preventDefault()
            dataKaryawan.push(insert())
            $('#tblKaryawan tbody').html(showData(dataKaryawan))
            console.log(showData(dataKaryawan));
        })

        $('#sorting').on('click', function(){
          dataKaryawan = insertionSort(dataKaryawan, 'id')

          $('#tblKaryawan tbody').html(showData(dataKaryawan))
            console.log(dataKaryawan);
        })

        $('#btnSearch').on('click', function(e){
          let teksSearch = $('#search').val()
          let id = searching(dataKaryawan, 'id', teksSearch)
          let data = []
          if(id >= 0)
            data.push(dataKaryawan[id]) 
          console.log(id)
          console.log(data)
          $('#tblKaryawan tbody').html(showData(data))
        })

        $('#status').on('change', function(){
          if($('#status').val() === 'couple'){
            $('#anak').removeAttr('readonly')
            $('anak').val('0')
          }else{
            $('#anak').attr('readonly', '')
            $('#anak').val('0')
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



  // const searching = (arr, text) => {
  //    if (text !== ''){
  //      let data = []
  //      for (let index = 0; index< arr.length; index++){
  //        for (const key in arr[index]) {
  //          const value = arr[index] [key].toString(
  //            for (let x = 0; x < value.length; x++){
  //              if (value.substring(x, x + text.length).toLowerCase() == text.toLowerCase()){
  //                data.push(dataKaryawan[index])
  //                break;
  //              }
  //            }
  //          )
  //        }
  //      }
  //    }
  //  } 

</script>
    
@endpush