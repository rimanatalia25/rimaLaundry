@extends('template/header')
    @push('styles')
        
    @endpush
    @section('content')
    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2"></div>
                    <div class="col sm-6"></div>
            </div>
        </section>

        {{--Main Content  --}}
        <section class="content">
            <div class="card-body">
                <form id="formBarang">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Id Barang</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="id" placeholder="ID" required>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-7">
                            <select class="form-control"  required id="nama_barang" placeholder="Nama Barang" name="nama_barang">
                                <option selected disabled value>Pilih Status</option>
                                <option value="detergent">Detergent</option>
                                <option value="pewangi">Pewangi</option>
                                <option value="detergent_sepatu">Detergent Sepatu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jns" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" value="cash" name="jns" id="jns" required>
                            <label class="form-check-label">Cash</label> 
                        </div>
                        <div class="col-sm-1">
                            <input class="form-check-input" type="radio" value="emoney" name="jns" id="jns" required>
                            <label class="form-check-label">Emoney</label>
                        </div>
                        </div>    @extends('template/header')
                        @push('styles')
                            
                        @endpush
                        @section('content')
                        <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2"></div>
                                        <div class="col sm-6"></div>
                                </div>
                            </section>
                    
                            {{--Main Content  --}}
                            <section class="content">
                                <div class="card-body">
                                    <form id="formBarang">
                                        <div class="form-group row">
                                            <label for="id" class="col-sm-2 col-form-label">Id Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="id" placeholder="ID" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                    
                                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <select class="form-control"  required id="nama_barang" placeholder="Nama Barang" name="nama_barang">
                                                    <option selected disabled value>Pilih Status</option>
                                                    <option value="detergent">Detergent</option>
                                                    <option value="pewangi">Pewangi</option>
                                                    <option value="detergent_sepatu">Detergent Sepatu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jns" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                                            <div class="col-sm-1">
                                                <input class="form-check-input" type="radio" value="cash" name="jns" id="jns" required>
                                                <label class="form-check-label">Cash</label> 
                                            </div>
                                            <div class="col-sm-1">
                                                <input class="form-check-input" type="radio" value="emoney" name="jns" id="jns" required>
                                                <label class="form-check-label">Emoney</label>
                                            </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="jumlah" class="col-sm-9 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal_beli" class="col-sm-9 col-form-label">Tanggal Beli</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" placeholder="tanggal_beli" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                                            <input type="" readonly name="harga_barang" id="harga_barang">
                                        </div>
                                        <div class="form-group row">
                                            <label for="diskon" class="col-sm-9 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" id="diskon" name="diskon" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="total" class="col-sm-9 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" id="total" name="total" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnSubmit" class="btn btn-primary">Submit</button>
                                            <button type="button" id="btnReset" class="btn btn-secondary">Cancel</button>
                                        </div>  
                                    </form>
                                </div>
                    
                        <div class="card">
                        <div class="card-header">
                            <h3>Data</h3>
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="button" id="sorting">Sorting</button>
                            </div>
                            <input type="search" class="form-control col-sm-2" name="search" id="search">
                            <button class="btn btn-success" type="button" id="btnSearch">Search</button>
                        </div>
                            <table class="table table-compact table-stripped table-bordered" id="tblBarang">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal Beli</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>qty</th>
                                        <th>Diskon</th>
                                        <th>Total Harga</th>
                                        <th>Jenis Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" align="center">belum ada data</td>
                                    </tr>
                                </tbody>
                    
                                {{-- <tfoot>
                                    <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                                    <td colspan="3 " align="center">Total</td>
                                    <td><span id="totalharga"></span></td>
                                    <td><span id="totaljumlah"></span></td>
                                    <td><span id="diskon"></span></td>
                                    <td colspan="2"><span id="grandtotalharga"></span></td>
                                    </tr>
                    
                                </tfoot> --}}
                    
                            </table>
                        </div>
                        </div>
                        </section>
                    
                        @endsection
                        @push('script')
                        <script>
                    
                        function insert(){
                                const data = $('#formBarang').serializeArray()
                                let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
                                let newData = {}
                                data.forEach(function(item, index){
                                    let name = item['name']
                                    let value = (name === 'id' ||
                                                name === 'jumlah'    
                                                ? parseInt(item['value']):item['value'])
                                    newData[name] = value
                                })
                                    newData['diskon'] = (newData['harga_barang'] * newData['jumlah']) * (calculateDiskon(newData)/100)
                            newData['total_harga'] = (newData['harga_barang'] * newData['jumlah']) - newData['diskon']
                                localStorage.setItem('dataBarang', JSON.stringify([...dataBarang, newData]))
                                return newData
                            }
                    
                            function showData(arr){
                                let row = ''
                                let totalJumlah = 0
                                let totalharga = 0
                                let totaldiskon = 0
                                let grandtotalharga = 0
                                
                    
                                if(arr.length == null){
                                    return row = `<tr><td colspan="8" align="center">belum ada data</td></tr>`
                                }
                                arr.forEach(function(item, index){
                                    totalJumlah += parseInt(item.jumlah)
                                    totalharga += parseInt(item.harga_barang)
                                    totaldiskon += parseInt(item.diskon)
                                    grandtotalharga += parseInt(item.total_harga)
                                    row += `<tr>`
                                    row += `<td>${item['id']}</td>`
                                    row += `<td>${item['tanggal_beli']}</td>`
                                    row += `<td>${item['nama_barang']}</td>`
                                    row += `<td>${item['harga_barang']}</td>`
                                    row += `<td>${item['jumlah']}</td>`
                                    row += `<td>${item['diskon']}</td>`
                                    row += `<td>${item['total_harga']}</td>`
                                    row += `<td>${item['jns']}</td></tr>`
                                    row += `</tr>`
                                })
                                    row += `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                                    <td colspan="3 " align="center">Total</td>
                                    <td>${totalharga}</td>
                                    <td>${totalJumlah}</td>
                                    <td>${totaldiskon}</td>
                                    <td colspan="2">${grandtotalharga}</td>
                                    </tr>`
                                return row
                            }
                    
                            function insertionSort(arr, key, type)
                    {
                        let i, j, id, value;
                        type = type === 'asc'?'>':'<'
                    
                        if(arr[0].constructor ===! Object || !key) return false
                        for (i = 1; i < arr.length; i++)
                        {
                            value = arr[i];
                            id = arr [i][key]
                            j = i - 1;
                    
                            while (j >= 0 && eval(arr[j][key] + type + id))
                            {
                                arr[j+1] = arr[j]; //data ke-2 = data ke-1
                                j --; // - 1; 
                            }
                            arr[j + 1] = value; //data ke-1 = data ke-2
                        }
                        return arr
                    }
                    function searching(arr, key, teks){
                        for(let i=0; i < arr.length; i++){
                            if(arr[i][key] == teks)
                            return i
                        }
                        return -1
                    }
                            $(function(){
                                //property
                                let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
                                $('#tblBarang tbody').html(showData(dataBarang))
                                //events
                                $('#formBarang').on('submit', function(e){
                                    e.preventDefault()
                                    insert()
                                    dataBarang = JSON.parse(localStorage.getItem('dataBarang'))
                                    $('#tblBarang tbody').html(showData(dataBarang))
                                    console.log(dataBarang);
                                })
                    
                                $('#sorting').on('click', function(){
                                data = insertionSort(dataBarang , 'id', 'asc')
                                console.log(data)
                                data && $('#tblBarang tbody').html(showData(dataBarang))
                            })
                    
                            $('#btnSearch').on('click', function(e){
                                let teksSearch = $("#search").val()
                                let id = searching(dataBarang ,'id', teksSearch)
                                let data = []
                                if(id >= 0)
                                    data.push(dataBarang[id])
                    
                                $('#tblBarang tbody').html(showData(data))
                            })
                                
                            })
                            
                            const calculateDiskon = (item) => {
                                let diskon = 0
                                let total_harga = item.harga_barang * item.jumlah
                                if (total_harga >= 50000) {
                                    diskon = 15
                                    return diskon
                                } else {
                                    return diskon
                                }
                            }
                            
                    
                    
                    
                            
                            // $('#sorting').on('click', function(){
                            //         data = insertionSort(dataBarang, 'id', 'desc')
                            //         console.log(data);    
                    
                            //         data && $('#tblBarang tbody').html(showData(dataBarang))
                            //     })
                    
                            
                                $('#nama_barang').on('change', function () {
                                    let value = $(this).val()
                                    let harga = $('#harga_barang')
                                    if (value == 'detergent') {
                                    harga.val(15000)
                                    } else if (value == 'pewangi') {
                                    harga.val(10000)
                                    } else if (value == 'detergent_sepatu') {
                                    harga.val(25000)
                                    }
                                })  
                    
                            </script>
                        @endpush
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_beli" class="col-sm-2 col-form-label">Tanggal Beli</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" placeholder="tanggal_beli" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                        <input type="" readonly name="harga_barang" id="harga_barang">
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-sm-9 col-form-label"></label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="diskon" name="diskon" placeholder="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Submit</button>
                        <button type="button" id="btnReset" class="btn btn-secondary">Cancel</button>
                    </div>  
                </form>
            </div>

    <div class="card">
    <div class="card-header">
        <h3>Data</h3>
    </div>
    <div class="card-body">
    <div class="form-group row">
        <div class="col-sm-2">
            <button class="btn btn-success" type="button" id="sorting">Sorting</button>
        </div>
        <input type="search" class="form-control col-sm-2" name="search" id="search">
        <button class="btn btn-success" type="button" id="btnSearch">Search</button>
    </div>
        <table class="table table-compact table-stripped table-bordered" id="tblBarang">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>qty</th>
                    <th>Diskon</th>
                    <th>Total Harga</th>
                    <th>Jenis Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8" align="center">belum ada data</td>
                </tr>
            </tbody>

            {{-- <tfoot>
                <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="3 " align="center">Total</td>
                <td><span id="totalharga"></span></td>
                <td><span id="totaljumlah"></span></td>
                <td><span id="diskon"></span></td>
                <td colspan="2"><span id="grandtotalharga"></span></td>
                </tr>

            </tfoot> --}}

        </table>
    </div>
    </div>
    </section>

    @endsection
    @push('script')
    <script>

    function insert(){
            const data = $('#formBarang').serializeArray()
            let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
            let newData = {}
            data.forEach(function(item, index){
                let name = item['name']
                let value = (name === 'id' ||
                            name === 'jumlah'    
                            ? parseInt(item['value']):item['value'])
                newData[name] = value
            })
                newData['diskon'] = (newData['harga_barang'] * newData['jumlah']) * (calculateDiskon(newData)/100)
        newData['total_harga'] = (newData['harga_barang'] * newData['jumlah']) - newData['diskon']
            localStorage.setItem('dataBarang', JSON.stringify([...dataBarang, newData]))
            return newData
        }

        function showData(arr){
            let row = ''
            let totalJumlah = 0
            let totalharga = 0
            let totaldiskon = 0
            let grandtotalharga = 0
            

            if(arr.length == null){
                return row = `<tr><td colspan="8" align="center">belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                totalJumlah += parseInt(item.jumlah)
                totalharga += parseInt(item.harga_barang)
                totaldiskon += parseInt(item.diskon)
                grandtotalharga += parseInt(item.total_harga)
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['tanggal_beli']}</td>`
                row += `<td>${item['nama_barang']}</td>`
                row += `<td>${item['harga_barang']}</td>`
                row += `<td>${item['jumlah']}</td>`
                row += `<td>${item['diskon']}</td>`
                row += `<td>${item['total_harga']}</td>`
                row += `<td>${item['jns']}</td></tr>`
                row += `</tr>`
            })
                row += `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="3 " align="center">Total</td>
                <td>${totalharga}</td>
                <td>${totalJumlah}</td>
                <td>${totaldiskon}</td>
                <td colspan="2">${grandtotalharga}</td>
                </tr>`
            return row
        }

        function insertionSort(arr, key, type)
{
    let i, j, id, value;
    type = type === 'asc'?'>':'<'

    if(arr[0].constructor ===! Object || !key) return false
    for (i = 1; i < arr.length; i++)
    {
        value = arr[i];
        id = arr [i][key]
        j = i - 1;

        while (j >= 0 && eval(arr[j][key] + type + id))
        {
            arr[j+1] = arr[j]; //data ke-2 = data ke-1
            j --; // - 1; 
        }
        arr[j + 1] = value; //data ke-1 = data ke-2
    }
    return arr
}
function searching(arr, key, teks){
    for(let i=0; i < arr.length; i++){
        if(arr[i][key] == teks)
        return i
    }
    return -1
}
        $(function(){
            //property
            let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
            $('#tblBarang tbody').html(showData(dataBarang))
            //events
            $('#formBarang').on('submit', function(e){
                e.preventDefault()
                insert()
                dataBarang = JSON.parse(localStorage.getItem('dataBarang'))
                $('#tblBarang tbody').html(showData(dataBarang))
                console.log(dataBarang);
            })

            $('#sorting').on('click', function(){
            data = insertionSort(dataBarang , 'id', 'asc')
            console.log(data)
            data && $('#tblBarang tbody').html(showData(dataBarang))
        })

        $('#btnSearch').on('click', function(e){
            let teksSearch = $("#search").val()
            let id = searching(dataBarang ,'id', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataBarang[id])

            $('#tblBarang tbody').html(showData(data))
        })
            
        })
        
        const calculateDiskon = (item) => {
            let diskon = 0
            let total_harga = item.harga_barang * item.jumlah
            if (total_harga >= 50000) {
                diskon = 15
                return diskon
            } else {
                return diskon
            }
        }
        

        
        // $('#sorting').on('click', function(){
        //         data = insertionSort(dataBarang, 'id', 'desc')
        //         console.log(data);    

        //         data && $('#tblBarang tbody').html(showData(dataBarang))
        //     })

        
            $('#nama_barang').on('change', function () {
                let value = $(this).val()
                let harga = $('#harga_barang')
                if (value == 'detergent') {
                harga.val(15000)
                } else if (value == 'pewangi') {
                harga.val(10000)
                } else if (value == 'detergent_sepatu') {
                harga.val(25000)
                }
            })  

        </script>
    @endpush














    <!-- SIMULASI TRANSAKSI -->
    @extends('template/header')
    @push('styles')
        
    @endpush
    @section('content')
    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2"></div>
                    <div class="col sm-6"></div>
            </div>
        </section>

        {{--Main Content  --}}
        <section class="content">
            <div class="card-body">
                <form id="formBarang">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Id Barang</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="id" placeholder="ID" required>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-7">
                            <select class="form-control"  required id="nama_barang" placeholder="Nama Barang" name="nama_barang">
                                <option selected disabled value>Pilih Status</option>
                                <option value="detergent">Detergent</option>
                                <option value="pewangi">Pewangi</option>
                                <option value="detergent_sepatu">Detergent Sepatu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jns" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" value="cash" name="jns" id="jns" required>
                            <label class="form-check-label">Cash</label> 
                        </div>
                        <div class="col-sm-1">
                            <input class="form-check-input" type="radio" value="emoney" name="jns" id="jns" required>
                            <label class="form-check-label">Emoney</label>
                        </div>
                        </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_beli" class="col-sm-2 col-form-label">Tanggal Beli</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" placeholder="tanggal_beli" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                        <input type="" readonly name="harga_barang" id="harga_barang">
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-sm-9 col-form-label"></label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="diskon" name="diskon" placeholder="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Submit</button>
                        <button type="button" id="btnReset" class="btn btn-secondary">Cancel</button>
                    </div>  
                </form>
            </div>

    <div class="card">
    <div class="card-header">
        <h3>Data</h3>
    </div>
    <div class="card-body">
    <div class="form-group row">
        <div class="col-sm-2">
            <button class="btn btn-success" type="button" id="sorting">Sorting</button>
        </div>
        <input type="search" class="form-control col-sm-2" name="search" id="search">
        <button class="btn btn-success" type="button" id="btnSearch">Search</button>
    </div>
        <table class="table table-compact table-stripped table-bordered" id="tblBarang">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>qty</th>
                    <th>Diskon</th>
                    <th>Total Harga</th>
                    <th>Jenis Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8" align="center">belum ada data</td>
                </tr>
            </tbody>

            {{-- <tfoot>
                <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="3 " align="center">Total</td>
                <td><span id="totalharga"></span></td>
                <td><span id="totaljumlah"></span></td>
                <td><span id="diskon"></span></td>
                <td colspan="2"><span id="grandtotalharga"></span></td>
                </tr>

            </tfoot> --}}

        </table>
    </div>
    </div>
    </section>

    @endsection
    @push('script')
    <script>

    function insert(){
            const data = $('#formBarang').serializeArray()
            let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
            let newData = {}
            data.forEach(function(item, index){
                let name = item['name']
                let value = (name === 'id' ||
                            name === 'jumlah'    
                            ? parseInt(item['value']):item['value'])
                newData[name] = value
            })
                newData['diskon'] = (newData['harga_barang'] * newData['jumlah']) * (calculateDiskon(newData)/100)
        newData['total_harga'] = (newData['harga_barang'] * newData['jumlah']) - newData['diskon']
            localStorage.setItem('dataBarang', JSON.stringify([...dataBarang, newData]))
            return newData
        }

        function showData(arr){
            let row = ''
            let totalJumlah = 0
            let totalharga = 0
            let totaldiskon = 0
            let grandtotalharga = 0
            

            if(arr.length == null){
                return row = `<tr><td colspan="8" align="center">belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                totalJumlah += parseInt(item.jumlah)
                totalharga += parseInt(item.harga_barang)
                totaldiskon += parseInt(item.diskon)
                grandtotalharga += parseInt(item.total_harga)
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['tanggal_beli']}</td>`
                row += `<td>${item['nama_barang']}</td>`
                row += `<td>${item['harga_barang']}</td>`
                row += `<td>${item['jumlah']}</td>`
                row += `<td>${item['diskon']}</td>`
                row += `<td>${item['total_harga']}</td>`
                row += `<td>${item['jns']}</td></tr>`
                row += `</tr>`
            })
                row += `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="3 " align="center">Total</td>
                <td>${totalharga}</td>
                <td>${totalJumlah}</td>
                <td>${totaldiskon}</td>
                <td colspan="2">${grandtotalharga}</td>
                </tr>`
            return row
        }

        function insertionSort(arr, key, type)
{
    let i, j, id, value;
    type = type === 'asc'?'>':'<'

    if(arr[0].constructor ===! Object || !key) return false
    for (i = 1; i < arr.length; i++)
    {
        value = arr[i];
        id = arr [i][key]
        j = i - 1;

        while (j >= 0 && eval(arr[j][key] + type + id))
        {
            arr[j+1] = arr[j]; //data ke-2 = data ke-1
            j --; // - 1; 
        }
        arr[j + 1] = value; //data ke-1 = data ke-2
    }
    return arr
}
function searching(arr, key, teks){
    for(let i=0; i < arr.length; i++){
        if(arr[i][key] == teks)
        return i
    }
    return -1
}
        $(function(){
            //property
            let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
            $('#tblBarang tbody').html(showData(dataBarang))
            //events
            $('#formBarang').on('submit', function(e){
                e.preventDefault()
                insert()
                dataBarang = JSON.parse(localStorage.getItem('dataBarang'))
                $('#tblBarang tbody').html(showData(dataBarang))
                console.log(dataBarang);
            })

            $('#sorting').on('click', function(){
            data = insertionSort(dataBarang , 'id', 'asc')
            console.log(data)
            data && $('#tblBarang tbody').html(showData(dataBarang))
        })

        $('#btnSearch').on('click', function(e){
            let teksSearch = $("#search").val()
            let id = searching(dataBarang ,'id', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataBarang[id])

            $('#tblBarang tbody').html(showData(data))
        })
            
        })
        
        const calculateDiskon = (item) => {
            let diskon = 0
            let total_harga = item.harga_barang * item.jumlah
            if (total_harga >= 50000) {
                diskon = 15
                return diskon
            } else {
                return diskon
            }
        }
        

        
        // $('#sorting').on('click', function(){
        //         data = insertionSort(dataBarang, 'id', 'desc')
        //         console.log(data);    

        //         data && $('#tblBarang tbody').html(showData(dataBarang))
        //     })

        
            $('#nama_barang').on('change', function () {
                let value = $(this).val()
                let harga = $('#harga_barang')
                if (value == 'detergent') {
                harga.val(15000)
                } else if (value == 'pewangi') {
                harga.val(10000)
                } else if (value == 'detergent_sepatu') {
                harga.val(25000)
                }
            })  

        </script>
    @endpush



    <!--                               -->

    @extends('template/header')
    @push('styles')

    @endpush
    @section('content')
    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2"></div>
                    <div class="col sm-6"></div>
            </div>
        </section>

        {{--Main Content  --}}
        <section class="content">
            {{-- form --}}
            <div class="card">
                <div class="card-header">
                    <h3>Simulasi Transaksi</h3>
                </div>
                <div class="card-body">
                <form id="formsaksi">
                    <div class="row">
                        <div class="col-sm-6 col-form-label">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID Transaksi</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="id" name="id" placeholder="ID" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="barang" class="col-sm-3 col-form-label">Barang DIbeli</label>
                        <div class="col-sm-5">
                        <select name   ="barang"
                                class  ="form-select"
                                id     ="barang"
                                aria-describedby="inputGroupPrepend3"
                                required="required">
                                <option value="gantungan_kunci">Gantungan Kunci</option>
                                <option value="ikat_rambut">Ikat Rambut</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="qty" class="col-sm-3 col-form-label">Jumlah beli</label>
                        <div class="col-sm-3">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="0" required>
                      </div>
                    </div>
                        </div>



             <div class="col-sm-6 col-form-label">
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Beli</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="warna" class="col-sm-3 col-form-label">warna</label>
                    <div class="col-sm-5">
                    <select name   ="warna"
                            class  ="form-select"
                            id     ="warna"
                            aria-describedby="inputGroupPrepend3"
                            required="required">
                            <option value="merah">merah</option>
                            <option value="kuning">kuning</option>
                    </select>
                  </div>
                </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama pembeli</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="nama" id="nama" name="nama" placeholder="nama" required>
                      </div>
                    </div>
                </div>

                    <input type="hidden" readonly name="harga" id="harga">

                         <div class="form-group row">
                        <label for="diskon" class="col-sm-9 col-form-label"></label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="diskon" name="diskon" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                            <button class="btn btn-default" id="btnReset" type="submit">Reset</button>
                        </div>
                    </div>


    <div class="card">
    <div class="card-header">
        <h3>Data</h3>
    </div>
    <div class="card-body">
    <div class="form-group row">

        <div class="col-sm-2">
            <button class="btn btn-success" type="button" id="sorting">Urutkan</button>
        </div>
        <input type="search" class="form-control col-sm-2" name="search" id="search">
        <button class="btn btn-success" type="button" id="btnSearch">Search</button>

    </div>
        <table class="table table-compact table-stripped table-bordered" id="tblBarang">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Barang</th>
                    <th>warna</th>
                    <th>harga</th>
                    <th>jumlah Beli</th>
                    <th>Nama Pelangggan</th>
                    <th>Diskon</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8" align="center">belum ada data</td>
                </tr>
            </tbody>

            {{-- <tfoot>
                <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="3 " align="center">Total</td>
                <td><span id="totalHarga"></span></td>
                <td><span id="totaljumlah"></span></td>
                <td><span id="diskon"></span></td>
                <td colspan="2"><span id="totalBayar"></span></td>
                </tr>

            </tfoot> --}}

        </table>
    </div>
    </div>
    </section>

    @endsection
    @push('script')
    <script>

    function insert(){
            const data = $('#formsaksi').serializeArray()
            let dataSaksi = JSON.parse(localStorage.getItem('dataSaksi')) || []
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
            localStorage.setItem('dataSaksi', JSON.stringify([...dataSaksi, newData]))
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
                row += `<td>${item['tanggal']}</td>`
                row += `<td>${item['barang']}</td>`
                row += `<td>${item['warna']}</td>`
                row += `<td>${item['harga']}</td>`
                row += `<td>${item['qty']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['diskon']}</td>`
                row += `<td>${item['total']}</td>`
                row += `</tr>`
            })
                row += `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="4 " align="center">Total</td>
                <td>${totalHarga}</td>
                <td>${totalQty}</td>
                <td></td>
                <td>${totalDiskon}</td>	
                <td colspan="2">${totalBayar}</td>
                </tr>`
            return row
        }

        function insertionSort(arr, key, type)
{
    let i, j, id, value;
    type = type === 'asc'?'>':'<'

    if(arr[0].constructor ===! Object || !key) return false
    for (i = 1; i < arr.length; i++)
    {
        value = arr[i];
        id = arr [i][key]
        j = i - 1;

        while (j >= 0 && eval(arr[j][key] + type + id))
        {
            arr[j+1] = arr[j]; //data ke-2 = data ke-1
            j --; // - 1;
        }
        arr[j + 1] = value; //data ke-1 = data ke-2
    }
    return arr
}
function searching(arr, key, teks){
    for(let i=0; i < arr.length; i++){
        if(arr[i][key] == teks)
        return i
    }
    return -1
}
        $(function(){
            //property
            let dataSaksi = JSON.parse(localStorage.getItem('dataSaksi')) || []
            $('#tblBarang tbody').html(showData(dataSaksi))
            //events
            $('#formsaksi').on('submit', function(e){
                e.preventDefault()
                insert()
                dataSaksi = JSON.parse(localStorage.getItem('dataSaksi'))
                $('#tblBarang tbody').html(showData(dataSaksi))
                console.log(dataSaksi);
            })

            $('#sorting').on('click', function(){
            data = insertionSort(dataSaksi , 'id', 'asc')
            console.log(data)
            data && $('#tblBarang tbody').html(showData(dataSaksi))
        })

        $('#btnSearch').on('click', function(e){
            let teksSearch = $("#search").val()
            let id = searching(dataSaksi ,'id', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataSaksi[id])

            $('#tblBarang tbody').html(showData(data))
        })

        })

        const calculateDiskon = (item) => {
            let diskon = 0
            let total = item.harga * item.qty
            if (total >= 30000) {
                diskon = 20
                return diskon
            } else {
                return diskon
            }
        }



        // $('#sorting').on('click', function(){
        //         data = insertionSort(dataSaksi, 'id', 'desc')
        //         console.log(data);

        //         data && $('#tblBarang tbody').html(showData(dataSaksi))
        //     })


            $('#barang').on('change', function () {
                let value = $(this).val()
                let harga = $('#harga')
                if (value == 'gantungan_kunci') {
                harga.val(5000)
                } else if (value == 'ikat_rambut') {
                harga.val(2500)
                }
            })

        </script>
    @endpush
