<?php
return array(
    'Collection-Clients-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbClients\Service\Clients\FetchQbBuilderService',
            'extractor' => 'HcbClients\Stdlib\Extractor\Clients\Client\Extractor'
        )
    ),

    'Collection-Clients-Block' => array(
        'parameters' => array(
            'inputData' => 'HcbClients\Data\Clients\Client\Block',
            'serviceCommand' => 'HcbClients\Service\Clients\Client\BlockCommand',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    )
);
