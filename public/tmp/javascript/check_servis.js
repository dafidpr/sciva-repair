function checkDataServis() {
    var e = document.getElementById('kodeservis').value
    // alert(e)
    var chek = document.getElementById('content_check')

    chek.innerHTML = ''
    $.ajax({
        url: `/admin/servis/${e}/json_service3`,
        type: "get",
        success: function(data) {
            if(data.transact == null){
                console.log('data sangat kosong')
                chek.innerHTML = `<hr><span style="color: #f14e4e!important;">No Nota Yang Anda Cari Tidak Valid!!</span>`
            }

                var obj = JSON.parse(data);
                console.log(obj)

                //status
                if(obj.transact.status == 'proses'){
                    var status = `<span class="bg-primary badge" style="background-color: #525ce5!important;">Dalam Proses</span>`
                }else if (obj.transact.status == 'finished'){
                    var status = `<span class="bg-success badge" style="background-color: #23c58f!important;">Selesai</span>`
                }else if (obj.transact.status == 'cancelled'){
                    var status = `<span class="bg-danger badge" style="background-color: #f14e4e!important;">Dibatalkan</span>`
                }else if (obj.transact.status == 'take'){
                    var status = `<span class="bg-secondary badge" style="background-color: #74788d!important;">Diambil</span>`
                }else if (obj.transact.status == 'waiting sparepart'){
                    var status = `<span class="bg-warning badge" style="background-color: #eeb148!important;">Menunggu Sparepart</span>`
                }

                //tanggal di ambil
                if (obj.transact.pickup_date == null) {
                    var pick = '-'
                } else {
                    var pick = new Date(obj.transact.pickup_date)
                    pick = pick.getDate()+"-"+(pick.getMonth()+1)+"-"+pick.getFullYear()
                }
                if (obj.transact.total == null) {
                    var harga = '-'
                } else {
                    var harga = 'Rp. '+ formatNumber(Math.floor(obj.transact.total))
                }

                //batas tanggal
                var batas = parseInt(obj.bt.value)
                var tgl_sv = obj.transact.service_date
                console.log(batas)
                var inputHari = 15 //Contoh aja hehe
                var hariKedepan = new Date(new Date(tgl_sv).getTime()+(batas*24*60*60*1000));
                console.log(hariKedepan.getDate()+"-"+hariKedepan.getUTCMonth()+"-"+hariKedepan.getFullYear())

                if(obj.transact.status == 'proses' || obj.transact.status == 'waiting sparepart'){

                chek.innerHTML = `<hr><table class="table table-striped" width="100%">
                    <tr>
                        <th width="45%">Status</th>
                        <th width="10%">:</th>
                        <th width="45%">${status}</th>
                    </tr>
                    <tr>
                        <th width="45%">Unit</th>
                        <th width="10%">:</th>
                        <th width="45%">${obj.transact.unit}</th>
                    </tr>
                    <tr>
                        <th width="45%">No.Seri</th>
                        <th width="10%">:</th>
                        <th width="45%">${obj.transact.serial_number}</th>
                    </tr>
                    <tr>
                        <th width="45%">Keluhan</th>
                        <th width="10%">:</th>
                        <th width="45%">${obj.transact.complient}</th>
                    </tr>
                    </table>`
                }else{

                    chek.innerHTML = `<hr><table class="table table-striped" width="100%">
                        <tr>
                            <th width="45%">Status</th>
                            <th width="10%">:</th>
                            <th width="45%">${status}</th>
                        </tr>
                        <tr>
                            <th width="45%">Unit</th>
                            <th width="10%">:</th>
                            <th width="45%">${obj.transact.unit}</th>
                        </tr>
                        <tr>
                            <th width="45%">No.Seri</th>
                            <th width="10%">:</th>
                            <th width="45%">${obj.transact.serial_number}</th>
                        </tr>
                        <tr>
                            <th width="45%">Keluhan</th>
                            <th width="10%">:</th>
                            <th width="45%">${obj.transact.complient}</th>
                        </tr>
                        <tr>
                            <th width="45%">Harga</th>
                            <th width="10%">:</th>
                            <th width="45%">${harga}</th>
                        </tr>
                        <tr>
                            <th width="45%">Batas Pengambilan Barang</th>
                            <th width="10%">:</th>
                            <th width="45%">${hariKedepan.getDate()+"-"+(hariKedepan.getMonth()+1)+"-"+hariKedepan.getFullYear()}</th>
                        </tr>
                        <tr>
                            <th width="45%">Tanggal Pengambilan</th>
                            <th width="10%">:</th>
                            <th width="45%">${pick}</th>
                        </tr>
                        </table>`


                }


        }
    })
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }
