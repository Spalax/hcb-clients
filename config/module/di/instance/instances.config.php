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
            'inputData' => 'HcbClients\Data\Clients\Client\Block',
            'serviceCommand' => 'HcbClients\Service\Clients\Client\BlockCommand',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    )
);
