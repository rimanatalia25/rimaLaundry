@extends('template/header')

@section('content')
    
<!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            {{-- NAVBAR --}}
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-form" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#formLaundry"> <i class="fas fa-puls nav-icon"></i> &nbsp;&nbsp;Cucian Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Disabled</a>
                </li>
            </ul>

            
            <div class="card" style="border-top:0px">
              <form action="transaksi" method="post">
                @include('transaksi.form')
                @include('transaksi.data')
                <input type="hidden" name="id_member" id="id_member">
              </form>
            </div>
            {{-- NAVBAR END --}}

                
          {{-- Javascript --}}
          
          @push('scripts')
              
          <script>
          //script untuk #menu data dan form transaksi
            $('#dataLaundry').collapse('show')

            $('#dataLaundry').on('show.bs.collapse', function(){
              $('#formLaundry').collapse('hide');
              $('#nav-form').removeClass('active');
              $('#nav-data').addClass('active');
            })

            $('#formLaundry').on('show.bs.collapse', function(){
              $('#dataLaundry').collapse('hide');
              $('#nav-data').removeClass('active');
              $('#nav-form').addClass('active');
            })

            //Initialize
            $(function(){
              $('#tblMember').DataTable();
            })
            //end initialize

            //Pemilihan Member
            $('#tblMember').on('click', '.pilihMemberBtn', function(){
              pilihMember(this)
              $('#modalMember').modal('hide')
            })
            //end pemilihan member

            //Pemilihan Paket
            $('#tblPaket').on('click', '.pilihPaketBtn', function(){
              pilihPaket(this)
              $('#modalPaket').modal('hide')
            })
            //end pemilihan Paket

            //function pilih member
            function pilihMember(x) {
              const tr = $(x).closest('tr')
              const namaJK = tr.find('td:eq(1)').text()+"/"+tr.find('td.eq(2)').text()
              const biodata = tr.find('td:eq(4)').text()+"/"+tr.find('td.eq(3)').text()
              const idMember = tr.find('.idMember').val()
              $('#nama-pelanggan').text(namaJK)
              $('#biodata-pelanggan').text(biodata)
              $('#id_member').val(idMember)              
            }
            //end fuction pilih member

            
            //function pilih paket
              function pilihpaket(x){
              const tr= $(x).closest('tr')
              const namaPaket = tr.find('td:eq(1)').text()
              const harga = tr.find('td:eq(2)').text() 
              const idPaket = tr.find('.idPaket').val()

              let data= ''
              let tbody = $('#tblTransaksi tbody tr td').text()
              data += '<tr>'
              data += '<td> ${nama Paket} </td>'
              data += '<td> ${harga} </td>';
              data += '<input type="hidden" name="id_paket[]" value="${idPaket}">'
              data += '<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2 " style="width:40px"></td>';
              data += '<td><label name="sub_total[]" class="subTotal">${harga}</label> </td>';
              data += '<td><button type="button" class="btnRemovePaket"><span class="fas fa-times-circle"></span></button></td>';
              data +='</tr>';

              if(tbody == 'Belum ada data') $('#tbl Transaksi tbody tr').remove();

              $('#tblTransaksi tbody').append(data);

              subtotal += Number(harga)
              total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
              $('#subtotal').text(subtotal)
              $('#total').text(total)

              }
            //Function pilih paket END



          </script>
            @endpush

          
          {{-- Javascript END --}}
















                    
                  
            
            </div>
          </div>
        </div>
        <!-- /page content -->

    

@endsection