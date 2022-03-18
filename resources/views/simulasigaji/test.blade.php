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
                    <h2>Data Karyawan</h2>
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

{{-- @push('scripts')
<script>
    function insert(){
      const data = $('#formKaryawan').serializeArray()
      let newData = {}
      data.forEach(function(item, index){
        let name = item['name']
        let value = (name === 'id'? Number(item['value']):item['value'])
        newData[name] = value
      })
      return newData;
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
      row += `</tr>`
    })
    return row
    }

    $(function(){
      //property
      let dataKaryawan = []

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
  } --}}

  // const searching = (arr, text) => {
  //   if (text !== ''){
  //     let data = []
  //     for (let index = 0; index< arr.length; index++){
  //       for (const key in arr[index]) {
  //         const value = arr[index] [key].toString(
  //           for (let x = 0; x < value.length; x++){
  //             if (value.substring(x, x + text.length).toLowerCase() == text.toLowerCase()){
  //               data.push(dataKaryawan[index])
  //               break;
  //             }
  //           }
  //         )
  //       }
  //     }
  //   }
  // }

{{-- </script> --}}
    
@endpush