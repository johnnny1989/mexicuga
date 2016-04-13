<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>
 */

return [
    'mode' => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username' => 'myselfadarsh-facilitator_api1.yahoo.com',
        'password' => '1392461547',
        'secret' => 'EHX-6xBtdfPm21rwUZygAR6IuUM8DLBng8d7T1WvCDxZ1ecolnBRLL8ebdmM',
        'certificate' => '',
    ],
    'live' => [
        'username' => '',
        'password' => '',
        'secret' => '',
        'certificate' => '',
    ],

    'payment_action' => 'Sale', // Can Only Be 'Sale', 'Authorization', 'Order'
    'currency' => 'USD',
    'notify_url' => url('makeorder'), // Change this accordingly for your application.
];
