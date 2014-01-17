<?php
return array(
    'HcbClients-Controller-List' => 'HcBackend\Controller\Common\Collection\ListController',
    'HcbClients-Controller-Block' => 'HcBackend\Controller\Common\Collection\DataController',
    'HcbClients-Controller-Show' => 'HcBackend\Controller\Common\Collection\ResourceController',

    'HcbClients-PaginatorViewModel' => 'Zf2Libs\Paginator\ViewModel\JsonModel',
    'HcbClients-Clients-Collection' => 'HcBackend\Data\Collection\Entities\ByIds',
    'HcbClients-Client-FetchService' => 'HcBackend\Service\FetchService'
);
