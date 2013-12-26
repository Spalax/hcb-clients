<?php
return array(
    'router' => include __DIR__ . '/module/router.config.php',
    'di' => include __DIR__ . '/module/di.config.php',

    'translator' => array (
        'translation_file_patterns' => array (
            'HcbClients' => array (
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo'
            )
        )
    ),

    'translations' => array (
        'package_lang_dirs' => array(
            'HcbClients' => array(
                'gettext' => array(
                    'path'=> __DIR__ . '/../../HcbClients/language',
                    'mo' => '%s.mo',
                    'pot' => __DIR__ . '/../../HcbClients/language/messages.pot'
                )
            )
        )
    )
);
