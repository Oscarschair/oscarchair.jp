<?php

/**
 * -----------------------------------------------------------------------------
 * Generated 2022-06-11T16:59:24+09:00
 *
 * DO NOT EDIT THIS FILE DIRECTLY
 *
 * @item      misc.latest_version
 * @group     concrete
 * @namespace null
 * -----------------------------------------------------------------------------
 */
return [
    'locale' => 'ja_JP',
    'version_installed' => '9.0.2',
    'version_db_installed' => '20220114215506',
    'misc' => [
        'login_redirect' => 'DESKTOP',
        'access_entity_updated' => 1649908336,
        'latest_version' => '8.5.6',
    ],
    'cache' => [
        'clear' => [
            'thumbnails' => false,
        ],
    ],
    'email' => [
        'enabled' => true,
    ],
    'mail' => [
        'method' => 'smtp',
        'methods' => [
            'smtp' => [
                'server' => 'smtp.lolipop.jp',
                'username' => 'contact@oscarchair.jp',
                'password' => 'hJKLfge_78sai-hJIo1',
                'port' => '465',
                'encryption' => 'SSL',
                'messages_per_connection' => null,
                'helo_domain' => 'localhost',
            ],
        ],
    ],
    'seo' => [
        'redirect_to_canonical_url' => false,
        'url_rewriting' => true,
    ],
    'upload' => [
        'extensions' => '*.flv;*.jpg;*.gif;*.jpeg;*.ico;*.docx;*.xla;*.png;*.psd;*.swf;*.doc;*.txt;*.xls;*.xlsx;*.csv;*.pdf;*.tiff;*.rtf;*.m4a;*.mov;*.wmv;*.mpeg;*.mpg;*.wav;*.3gp;*.avi;*.m4v;*.mp4;*.mp3;*.qt;*.ppt;*.pptx;*.kml;*.xml;*.svg;*.webm;*.ogg;*.ogv;*.xlsm;*.webp',
    ],
    'messenger' => [
        'consume' => [
            'method' => 'app',
        ],
    ],
    'processes' => [
        'scheduler' => [
            'enable' => true,
        ],
        'logging' => [
            'method' => 'none',
            'file' => [
                'directory' => '',
            ],
        ],
    ],
];
