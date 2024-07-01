$(function(){
    var cleave = new Cleave('.input-number', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    var cleave = new Cleave('.input-phone-number', {
        phone: true,
        phoneRegionCode: 'ID'
    });

    $('.btn-submit').on('click', function(event){
        event.preventDefault();
        const form = $('.form-donation')
        const t = $(this)
        if(!form[0].checkValidity()){
            form[0].reportValidity()
        } else {
            $.ajax({
                url: `${baseUrl}/donasi/payment_method`,
                data: form.serialize(),
                method: 'POST',
                cache: false,
                beforeSend: function(){
                    $('.err-msg').text('')
                    t.prop('disabled', true)
                },
                success: function(data) {
                    function changeResult(type,data){
                        $.ajax({
                            url: `${baseUrl}/donasi/finish`,
                            data: { data: data},
                            method: 'POST',
                            cache: false,
                            beforeSend: function() {
                                t.prop('disabled', true)
                            },
                            success: function(data) {
                                if (data.success === true) {
                                    t.prop('disabled', true).text('Redirect...')
                                    location.href=`${baseUrl}/donasi/success/${data.transaction_id}`
                                }
                            },
                        })
                    }

                    snap.pay(data, {
                        onSuccess: function(result){
                            changeResult('success', result);
                        },
                        onPending: function(result){
                            changeResult('pending', result);
                        },
                        onError: function(result){
                        },
                        onClose: function(result){
                            $.ajax({
                                url: `${baseUrl}/donasi/delete`,
                                data: { snap_token: data},
                                method: 'POST',
                                cache: false,
                                success: function(data) {
                                },
                            })
                        }
                    });
                },
                error: function(data) {
                    if (data.responseJSON) {
                        if (data.responseJSON.errors) {
                            $('.err-msg-jenis_donasi').text(data.responseJSON.errors.jenis_donasi)
                            $('.err-msg-jumlah').text(data.responseJSON.errors.jumlah)
                            $('.err-msg-keterangan').text(data.responseJSON.errors.keterangan)
                            $('.err-msg-nama').text(data.responseJSON.errors.nama)
                            $('.err-msg-nomor_handphone').text(data.responseJSON.errors.nomor_handphone)
                            $('.err-msg-email').text(data.responseJSON.errors.email)
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: '',
                            })
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: '',
                        })
                    }
                },
                complete: function(){
                    t.prop('disabled', false)
                }
            })
        }
    })
})