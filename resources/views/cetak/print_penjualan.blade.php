<html>
<script src="{{asset('tmp/qz/qz-tray.js')}}"></script>
<script>
    var data = <?php echo $company; ?>;
    var footer = <?php echo "'".$footer->value."'"; ?>;
    var sale_detail = <?php echo $sale_detail; ?>;
    console.log(sale_detail)
function print() {
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
            data.name.toLowerCase() +
            '\x1B' + '\x45' + '\x0A'+                            // bold off
            '\x0A'+                                              // line break
            data.telephone +
            '\x0A'+                                              // line break
            data.address.toLowerCase() +
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            '\x1B' + '\x61' + '\x30'+                            // left align
            'TANGGAL   : '+<?php echo "'".$sale->date."'"; ?> +
            '\x0A'+                                              // line break
            'No. NOTA  : '+<?php echo "'".$sale->invoice."'"; ?> +
            '\x0A'+
            `PELANGGAN : `+<?php echo "'".strtoupper($sale->_customer->name)."'"; ?> +
            '\x0A'+                                              // line break
            'ALAMAT    : '+<?php echo "'".strtoupper($sale->_customer->address)."'"; ?> +
            '\x0A'+                                              // line break
            'No. HP    : '+<?php echo "'".$sale->_customer->telephone."'"; ?> +
            '\x0A'+                                              // line break
            '--------------------------------------'+
            '\x0A'+                                              // line break
            <?php foreach($sale_detail as $item) :?>
            <?php echo "'".strtoupper($item->_product->name)."'"; ?>+
            '\x0A'+                                              // line break
            `   ${<?= "'".$item->quantity."'"; ?>} X     ${<?= "'".$item->_product->purchase_price."'"; ?>}     ${<?= "'".$item->sub_total."'"; ?>}`+
            '\x0A'+                                              // line break
            <?php endforeach;?>
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            'Discount : '+<?php echo "'".number_format($sale->discount)."'"; ?> +
            '\x0A'+                                              // line break
            'TOTAL    : '+<?php echo "'".number_format($sale->total)."'"; ?> +
            '\x0A'+                                              // line break
            'BAYAR    : '+<?php echo "'".number_format($sale->payment)."'"; ?> +
            '\x0A'+                                              // line break
            'KEMBALI  : '+<?php echo "'".number_format($sale->cashback)."'"; ?> +
            '\x0A'+                                              // line break
            '--------------------------------------'+
            '\x0A'+                                              // line break
            'OPERATOR : '+<?php echo strtoupper($sale->_user->name); ?> +
            '\x0A'+                                              // line break
            '\x0A'+                                              // line break
            '\x1B' + '\x61' + '\x31'+                            // center align
            footer+
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
console.log(print())
</script>
<button onclick="print();">Print</button>
</html>
