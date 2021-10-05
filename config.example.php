<?php

$config = [
    'fritzbox' => [
        'url'      => 'fritz.box',      // your Fritz!Box IP
        'user'     => 'youruser',       // your Fritz!Box user
        'password' => 'xxxxxxxxxx',     // your Fritz!Box user password
        'phonebook' => 0,               // phonebooks to convert (first tab = 0!)
    ],

    'ipPhonebooks' => [                         // uncomment your desired export(s)
        /*
        'jfritz' => [                           // name is just for informational purposes
            'xsl' => 'jfritz.xsl',              // XSL transformation file in .\lib\
            'path' => '',                       // the converted phone book is saved there
            'file' => 'jfritz.phonebook.xml',
        ],
        'Yealink' => [
            'xsl' => 'Yealink.xsl',
            'path' => '',
            'file' => 'LocalPhonebook.xml',
        ],
        'snom' => [
            'xsl' => 'snom.xsl',
            'path' => '',
            'file' => 'phonebook.xml',
        ],
        'Grandstream' => [
            'xsl' => 'grandstream.xsl',
            'path' => '',
            'file' => 'gs_phonebook.xml',
        ],
        'Cisco' => [
            'xsl' => 'Cisco.xsl',
            'path' => '',
            'file' => 'Phonebook.xml',
        ],
        */
    ],
];
