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
              @if ($errors->any())
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
              @endif

              {{-- Notifikasi Sukses --}}
            @if(session('success'))
            <div class="alert alert-success" role="success" id="success-alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
              <form method="post" action="{{ url(request()->segment(1).'/transaksi') }}">
                @csrf
                @include('transaksi.form')
                @include('transaksi.data')
                <input type="hidden" name="id_member" id="id_member">
              </form>
            </div>
            {{-- NAVBAR END --}}

            
                
          {{-- Javascript --}}
          
          @push('scripts')
              
          <script>
        $(document).ready(function(){
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
            let subtotal = total = 0;
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

            //Initialize
            // let subtotal = total = 0;
            // $(function(){
            //   $('#tblMember').DataTable();
            // })
            //Initialize END

            //onchange qty
            $('#tblTransaksi').on('change', '.qty', function(){
              hitungTotalAkhir(this)
            })
            //onchange qty end

            //function pilih member
            function pilihMember(x) {
              const tr = $(x).closest('tr')
              const namaJK = tr.find('td:eq(1)').text()+" / "+tr.find('td:eq(2)').text()
              const biodata = tr.find('td:eq(4)').text()+" / "+tr.find('td:eq(3)').text()
              const idMember = tr.find('.idMember').val()
              $('#nama-pelanggan').text(namaJK)
              $('#biodata-pelanggan').text(biodata)
              $('#id_member').val(idMember)
              
              $('#your-modal-id').modal('hide');
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
            }
            //end fuction pilih member

            
            //function pilih paket
            function pilihPaket(x){
              const tr= $(x).closest('tr')
              const namaPaket = tr.find('td:eq(1)').text()
              const harga = tr.find('td:eq(2)').text() 
              const idPaket = tr.find('.idPaket').val()

              let data= ''
              let tbody = $('#tblTransaksi tbody tr td').text()
              data += '<tr>'
              data += `<td> ${namaPaket} </td>`
              data += `<td> ${harga} </td>`;
              data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
              data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2 " style="width:40px"></td>`;
              data += `<td><label name="sub_total[]" class="subTotal">${harga}</label> </td>`;
              data += `<td><button type="button" class="btnRemovePaket btn btn-danger"><span class="fa fa-trash"></span></button></td>`;
              data +='</tr>';

              if(tbody == 'Belum ada Data') $('#tbl Transaksi tbody tr').remove();

              $('#tblTransaksi tbody').append(data);

              subtotal += Number(harga)
              total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
              $('#subtotal').text(subtotal)
              $('#total').text(total)

              $('#your-modal-id').modal('hide');
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();

              }
            //Function pilih paket END

            //Function hitung total
            function hitungTotalAkhir(a){
              let qty = Number($(a).closest('tr').find('.qty').val());
              let harga = Number($(a).closest('tr').find('td:eq(1)').text());
              let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
              let count = qty * harga;
              subtotal = subtotal - subTotalAwal + count
              total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
              $(a).closest('tr').find('.subTotal').text(count)
              $('#subtotal').text(subtotal)
              $('#total').text(total)
            }
            //Function hitung total END

            //function show data
            // function showData(arr){
            //   let row = ''
            //   if(arr.length == null){
            //     return row = `<tr><td colspan="3">Belum ada Data</td></tr>` 
            // }
            // arr.forEach(function(item, index){
            //   row += `<tr>`
            //   row += `<td>${item['namPaket']}</td>`
            //   row += `<td>${item['harga']}</td>`
            //   row += `<td>${item['idPaket']}</td>`
            //   row += `</tr>`
            // })
            // return row
            // }


            //Remove paket
            $('#tblTransaksi').on('click', '.btnRemovePaket', function(){
              let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
              subtotal -= subTotalAwal
              total -= subTotalAwal;

              $currentRow = $(this).closest('tr').remove();
              $('#subtotal').text(subtotal)
              $('#total').text(total)
            })
            //Remove paket END


          });
          </script>
            @endpush

          
          {{-- Javascript END --}}
















                    
                  
            
            </div>
          </div>
        </div>
        <!-- /page content -->

    

@endsection