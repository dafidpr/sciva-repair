function checkDataServis() {
    var e = document.getElementById('kodeservis').value
    // alert(e)
    var chek = document.getElementById('content_check')

    chek.innerHTML = ''
    $.ajax({
        url: `/admin/servis/${e}/json_service2`,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            console.log(obj)
            if(obj.status == 'proses'){
                var status = `Proses`
            }else if (obj.status == 'finished'){
                var status = `Selesai`
            }else if (obj.status == 'cancelled'){
                var status = `Batal`
            }else if (obj.status == 'take'){
                var status = `Diambil`
            }else if (obj.status == 'waiting sparepart'){
                var status = `Menunggu Sparepart`
            }
            chek.innerHTML = `<hr><table class="table table-bordered" width="100%">
            <tr>
                <th>Kode</th>
                <th>Unit</th>
                <th>Keluhan</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>${obj.transaction_code}</td>
                <td>${obj.unit}</td>
                <td>${obj.complient}</td>
                <td>${status}</td>
            </tr>
        </table>`
        }
    })
}
