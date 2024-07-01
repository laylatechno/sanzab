<?php $snapJSUrl = $this->config->item('midtrans_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js'; ?>
<script src="<?= base_url('assets/cleave-js/cleave.min.js') ?>"></script>
<script src="<?= base_url('assets/cleave-js/addons/cleave-phone.id.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="<?= $snapJSUrl ?>" data-client-key="<?= $this->config->item('midtrans_client_key') ?>"></script>
<script>
    const baseUrl = '<?= base_url() ?>'
</script>
<script src="<?= base_url('assets/front/js/donasi.min.js') ?>"></script>