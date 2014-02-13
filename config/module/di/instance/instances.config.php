<?php
return array(
    'HcbClient-Controller-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbClient\Service\FetchQbBuilderService',
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
            'inputData' => 'HcbClient-Clients-Collection',
            'serviceCommand' => 'HcbClient\Service\BlockService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbClient-Controller-Show' => array(
        'parameters' => array(
            'fetchService' => 'HcbClient-Client-FetchService',
            'extractor' => 'HcbClient\Stdlib\Extractor\Client'
        )
    ),

    'HcbClient-Clients-Collection' => array(
        'parameters' => array(
            'idsCollection' => 'HcbClient\Service\Collection\IdsService',
            'inputName' => 'clients'
        )
    ),

    'HcbClient-Client-FetchService' => array(
        'parameters' => array(
            'entityName' => 'HcbClient\Entity\User'
        )
    ),

    'HcbClient\Service\BlockService' => array(
        'parameters' => array(
            'blockData' => 'HcbClient-Clients-Collection'
        )
    )
);
