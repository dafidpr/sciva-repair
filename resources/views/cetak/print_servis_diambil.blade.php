<html>
<script src="{{asset('tmp/qz/qz-tray.js')}}"></script>
<script>
    var company = <?= $company;?>;
    var footer = <?= $footer;?>;
    var service = <?= $service;?>;
    var method_pay = <?= "'".$service->payment_method."'";?>;
    if(method_pay == 'cash'){
        var meth = 'KEMBALI  :'
    }else{
        var meth = 'HUTANG   :'
    }

    console.log(company)
    console.log(footer)
    console.log(service)
function print_take_sr() {
    qz.websocket.connect().then(() => {
        return qz.printers.find("EPSON TM-U220");
    }).then((found) => {
        var config = qz.configs.create(found);
        var data = [{
            type: 'raw',
            language: "ESCPOS",
            dotDensity: 'double',
            data:
            '\x1B' + '\x61' + '\x31'+                            // center align
            '\x1B' + '\x45' + '\x0D'+                            // bold on
            <?= "'".strtoupper($company->name)."'";?> +
            '\x1B' + '\x45' + '\x0A'+                            // bold off
            '\x0A'+                                              // line break
            <?= "'".$company->telephone."'";?> +
            '\x0A'+                                              // line break
            <?= "'".strtoupper($company->address)."'";?> +
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            '\x1B' + '\x61' + '\x30'+                            // left align
            'TANGGAL   : '+<?= "'".$service->updated_at."'"?> +
            '\x0A'+                                              // line break
            'No. NOTA  : '+<?= "'".$service->transaction_code."'"?> +
            '\x0A'+
            'PELANGGAN : '+<?php echo "'".ucfirst($service->_customer->name)."'"; ?> +
            '\x0A'+                                              // line break
            'ALAMAT    : '+<?php echo "'".ucfirst($service->_customer->address)."'"; ?> +
            '\x0A'+                                              // line break
            'No. HP    : '+<?php echo "'".ucfirst($service->_customer->telephone)."'"; ?> +
            '\x0A'+                                              // line break
            '--------------------------------------'+
            '\x0A'+                                              // line break
            'UNIT      : '+<?= "'".$service->unit."'"?> +
            '\x0A'+                                              // line break
            'NO. SERI  : '+<?= "'".$service->serial_number."'"?> +
            '\x0A'+                                              // line break
            'KELUHAN   : '+
            '\x0A'+                                              // line break
            <?= "'".$service->complient."'"?> +
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            'KELENGKAPAN :'+
            '\x0A'+                                              // line break
            <?= "'".$service->completenes."'"?> +
            '\x0A'+                                              // line break
            '--------------------------------------'+
            '\x0A'+                                              // line break
            <?php foreach($service_detail as $item) :?><?php if($item->repaire_id == null): ?><?= "'".$item->qty."'";?>+"x "+<?= "'".$item->_product->name."'";?>+
            <?php endif;?><?php endforeach;?>'\x0A'+                                              // line break
            '\x0A'+                                              // line break
            <?php foreach($service_detail as $item) :?><?php if($item->sparepart_id == null): ?>"1x "+<?= "'".$item->_repaire->name."'";?>+
            <?php endif;?><?php endforeach;?>'\x0A'+                                              // line break
            '\x0A'+                                              // line break
            'Discount : '+<?= "'Rp. ".number_format($service->discount)."'";?> +
            '\x0A'+                                              // line break
            'TOTAL    : '+<?= "'Rp. ".number_format($service->total)."'";?> +
            '\x0A'+                                              // line break
            'BAYAR    : '+<?= "'Rp. ".number_format($service->payment)."'";?> +
            '\x0A'+                                              // line break
            meth+<?= "'Rp. ".number_format($service->cashback)."'";?> +
            '\x0A'+                                              // line break
            '--------------------------------------'+
            '\x0A'+                                              // line break
            'OPERATOR : '+<?= "'".ucfirst($service->_user->name)."'";?> +
            '\x0A'+                                              // line break
            'TEKNISI  : '+<?= "'".ucfirst($service->_user->name)."'";?> +
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            '\x1B' + '\x61' + '\x31'+                            // center align
            <?= "'".$footer->value."'";?>+
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            '\n\n\n\n\n\n'+
            '\x1B' + '\x69',

        }];
            return qz.print(config, data);
    }).catch((e) => {
        alert(e);
    }).finally(() => {
        return qz.websocket.disconnect();
    });
}
console.log(print_take_sr())
</script>
</html>
