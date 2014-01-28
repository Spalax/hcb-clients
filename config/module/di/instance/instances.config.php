<?php
return array(
    'HcbClients-Controller-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbClients\Service\Clients\FetchQbBuilderService',
            'viewModel' => 'HcbClients-PaginatorViewModel'
        )
    ),

    'HcbClients-PaginatorViewModel' => array(
        'parameters' => array(
            'extractor' => 'HcbClients\Stdlib\Extractor\Clients\Client\Extractor'
        )
    ),

    'HcbClients-Controller-Block' => array(
        'parameters' => array(
            'inputData' => 'HcbClients-Clients-Collection',
            'serviceCommand' => 'HcbClients\Service\Clients\BlockService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbClients-Controller-Show' => array(
        'parameters' => array(
            'fetchService' => 'HcbClients-Client-FetchService',
            'extractor' => 'HcbClients\Stdlib\Extractor\Clients\Client\Extractor'
        )
    ),

    'HcbClients-Clients-Collection' => array(
        'parameters' => array(
            'idsCollection' => 'HcbClients\Service\Clients\Collection\IdsService',
            'inputName' => 'clients'
        )
    ),

    'HcbClients-Client-FetchService' => array(
        'parameters' => array(
            'entityName' => 'HcbClients\Entity\User'
        )
    ),

    'HcbClients\Service\Clients\BlockService' => array(
        'parameters' => array(
            'blockData' => 'HcbClients-Clients-Collection'
        )
    )
);
