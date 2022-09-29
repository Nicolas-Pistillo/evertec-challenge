<?php 

return [

    'buyer' => [
        'document' => '1122334455',
        'documentType'  => 'CC',
        'name'          => "Nicolas",
        'surname'       => "Pistillo",
        'company'       => "SBI",
        'email'         => "pistillonicolas@gmail.com",
        'mobile'        => "+5731111111111",
        'address'       => [
            'street'     => 'Calle falsa 123',
            'city'       => 'La Plata',
            'state'      => 'Buenos Aires',
            'postalCode' => '55555',
            'country'    => 'Argentina',
            'phone'      => '+573111111111'
        ]
    ],

    'shipping' => [
        'document' => '1122334455',
        'documentType'  => 'CC',
        'name'          => "Mariano",
        'surname'       => "Acosta",
        'company'       => "Pedidos Ya",
        'email'         => "mariano@test.com",
        'mobile'        => "+5731111111111",
        'address'       => [
            'street'     => 'Calle falsa 123',
            'city'       => 'Junin',
            'state'      => 'Buenos Aires',
            'postalCode' => '55555',
            'country'    => 'Argentina',
            'phone'      => '+573111111111'
        ]
    ],

    'subscription' => [
        'reference'   => '12345',
        'description' => 'Ejemplo de descripción',
        'fields'      => [
            'keyword'   => '1111',
            'value'     => 'lastDigits',
            'displayOn' => 'none'
        ]
    ]

];