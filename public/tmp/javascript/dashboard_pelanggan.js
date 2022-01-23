function ps_servis(e) {
    $.ajax({
        url: "/pelanggan/" + e + "/detail_service",
        type: "get",
        success: function (data) {
            var obj = JSON.parse(data);
            var sv_dt = new Date(`${obj.service_date}`);
            if(obj.total == null){
                var total = '-'
            }else{
                var total = "Rp." + new Intl.NumberFormat('de-DE', { maximumSignificantDigits: 3 }).format(parseInt(obj.total))

            }
            if (obj.status == 'proses') {
                var status_perbaikan = 'DALAM PROSES'
            } else if (obj.status == 'waiting sparepart'){
                var status_perbaikan = 'MENUNGGU SPAREPART'
            } else if (obj.status == 'finished'){
                var status_perbaikan = 'SELESAI'
            }else if (obj.status == 'cancelled'){
                var status_perbaikan = 'DIBATALKAN'
            }else if (obj.status == 'take'){
                var status_perbaikan = 'DIAMBIL'
            }
            if(obj.pickup_date == null){
                var pickup = '-'
            }else{
                var pickup = new Date(`${obj.service_date}`)
                pickup = pickup.getDate()+"-"+(pickup.getMonth()+1)+'-'+pickup.getFullYear()
            }
            if(obj.notes == null){
                var notes = '-'
            }else{
                var notes = obj.notes
            }

            $('#pstgl_servis').html(sv_dt.getDate()+"-"+(sv_dt.getMonth()+1)+'-'+sv_dt.getFullYear());
            $('#psnota').html(obj.transaction_code);
            $('#psunit').html(obj.unit);
            $('#pspasscode').html(obj.passcode);
            $('#pscomplient').html(obj.complient);
            $('#pscompletenes').html(obj.completenes);
            $('#pstotal').html(total);
            $('#psstatus').html(status_perbaikan);
            $('#psnotes').html(notes);
            $('#psseri').html(obj.serial_number);
            $('#pstake').html(pickup);
            $('.bs-modal-detail-pelanggan').modal('show');
        }
    })
}
