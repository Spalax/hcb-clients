<?php
return array(
    'router' => include __DIR__ . '/module/router.config.php',
    'di' => include __DIR__ . '/module/di.config.php',

    'doctrine' => array(
        'driver' => array(
            'app_driver' => array(
                'paths' => array(__DIR__ . '/../src/HcbClients/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'HcbClients\Entity' => 'app_driver'
                )
            )
        )
    ),

    'zf2simpleacl' => array(
        'roles' => array('client'=>array('name'=>'client',  'id'=>\HcbClients\Entity\Client::ROLE_CLIENT))
    ),

    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'HcbClients' => __DIR__ . '/../public',
            )
        )
    ),

    'hc-backend'=> array(
        'packages' => array(
            'hcb-clients' => array(
                'js'=>array(
                    'type'=>'content',
                    'http_path'=>'/js/src/hcb-clients'
                )
            )
        )
    )
);
