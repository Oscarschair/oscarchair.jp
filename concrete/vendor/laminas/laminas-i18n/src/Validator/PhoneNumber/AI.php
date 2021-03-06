<?php

return [
    'code' => '1',
    'patterns' => [
        'national' => [
            'general' => '/^[2589]\d{9}$/',
            'fixed' => '/^2644(?:6[12]|9[78])\d{4}$/',
            'mobile' => '/^264(?:235|476|5(?:3[6-9]|8[1-4])|7(?:29|72))\d{4}$/',
            'tollfree' => '/^8(?:00|55|66|77|88)[2-9]\d{6}$/',
            'premium' => '/^900[2-9]\d{6}$/',
            'personal' => '/^5(?:00|33|44)[2-9]\d{6}$/',
            'emergency' => '/^911$/',
        ],
        'possible' => [
            'general' => '/^\d{7}(?:\d{3})?$/',
            'mobile' => '/^\d{10}$/',
            'tollfree' => '/^\d{10}$/',
            'premium' => '/^\d{10}$/',
            'personal' => '/^\d{10}$/',
            'emergency' => '/^\d{3}$/',
        ],
    ],
];
