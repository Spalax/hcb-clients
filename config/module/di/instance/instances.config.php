<?php
return array(
    'HcbClient-Controller-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbClient\Service\Collection\FetchQbBuilderService',
            'viewModel' => 'HcbClient-PaginatorViewModel'
        )
    ),

    'HcbClient-PaginatorViewModel' => array(
        'parameters' => array(
            'extractor' => 'HcbClient\Stdlib\Extractor\Client'
        )
    ),

    'HcbClient-Controller-Block' => array(
        'parameters' => array(
            'inputData' => 'HcbClients-Data-Collection-Entities-ByIds-Client',
            'serviceCommand' => 'HcbClient\Service\Collection\BlockService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbClient-Controller-Show' => array(
        'parameters' => array(
            'fetchService' => 'HcbClient-Client-FetchService',
            'extractor' => 'HcbClient\Stdlib\Extractor\Client'
        )
    ),

    'HcbClients-Service-Collection-IdsService-Client' => array(
        'parameters' => array(
            'entityName' => 'HcbClient\Entity\User'
        )
    ),

    'HcbClients-Data-Collection-Entities-ByIds-Client' => array(
        'parameters' => array(
            'idsCollection' => 'HcbClients-Service-Collection-IdsService-Client',
            'inputName' => 'clients'
        )
    ),

    'HcbClient-Client-FetchService' => array(
        'parameters' => array(
            'entityName' => 'HcbClient\Entity\User'
        )
    ),

    'HcbClient\Service\Collection\BlockService' => array(
        'parameters' => array(
            'blockData' => 'HcbClients-Data-Collection-Entities-ByIds-Client'
        )
    )
);
