<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function transactionStatus($transactionStatus, $withBadge = false) 
{
    $status = '';
    $badge = '';

    switch($transactionStatus) {
        case 'pending':
            $status = 'Tertunda';
            $badge = 'badge-primary';
            break;

        case 'expire':
            $status = 'Kadaluarsa';
            $badge = 'badge-danger';
            break;

        case 'settlement':
            $status = 'Berhasil';
            $badge = 'badge-success';
            break;

        default:
            $status = 'Tidak Diketahui';
            $badge = 'badge-secondary';
        
    }

    return $withBadge ? '<span class="text-white p-2 ' . $badge . '" style="border-radius:5px">' . $status . '</span>' : $status;
}

function paymentMethod($paymentData)
{
    $paymentMethod = '';

    switch($paymentData->payment_type) {
        case 'bank_transfer':
            $paymentMethod = 'Bank Transfer';
            break;

        case 'cstore':
            $paymentMethod = ucwords($paymentData->store);
            break;

        default:
            $paymentMethod = ucwords(str_replace('_', ' ', $paymentData->payment_type));
        
    }

    return $paymentMethod;
}