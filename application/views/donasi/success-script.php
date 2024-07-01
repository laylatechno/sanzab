<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<script>
    $(function(){
        <?php if(isset($donasi->payment_code)): ?>
            JsBarcode("#barcode", "<?= $donasi->payment_code ?>");
        <?php endif ?>
    })
</script>