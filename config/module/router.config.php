<?php
return array(
    'routes' => array(
        'hc-backend' => array(
            'child_routes' => array(
                'clients' => include __DIR__ . '/router/clients.config.php'
            )
        )
    )
);
