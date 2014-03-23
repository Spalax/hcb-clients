<?php
return array(
    'type' => 'literal',
    'options' => array(
        'route' => '/clients'
    ),
    'may_terminate' => false,
    'child_routes' => array(
        'show' => array(
            'type' => 'segment',
            'options' => array(
                'route' => '/:id',
                'constraints' => array( 'id' => '[0-9]+' )
            ),
            'may_terminate' => false,
            'child_routes' => array(
                'show' => array(
                    'type' => 'method',
                    'options' => array(
                        'verb' => 'get',
                        'defaults' => array(
                            'controller' => 'HcbClient-Controller-Show'
                        )
                    )
                )
            )
        ),
        'read' => array(
            'type' => 'method',
            'options' => array(
                'verb' => 'get'
            ),
            'may_terminate' => false,
            'child_routes' => array(
                'list' => array(
                    'type' => 'XRequestedWith',
                    'options' => array(
                        'with' => 'XMLHttpRequest',
                        'defaults' => array(
                            'controller' => 'HcbClient-Controller-List'
                        )
                    )
                )
            )
        ),
        'execute' => array(
            'type' => 'method',
            'options' => array(
                'verb' => 'post'
            ),
            'may_terminate' => false,
            'child_routes' => array(
                'block' => array(
                    'type' => 'literal',
                    'options' => array(
                        'route' => '/block',
                        'defaults' => array(
                            'controller' => 'HcbClient-Controller-Block'
                        )
                    )
                )
            )
        )
    )
);
