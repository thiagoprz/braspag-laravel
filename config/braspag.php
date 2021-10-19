<?php
return [

    /**
     * Utilizar a documentação da Braspag para auxiliar na configuração
     * @link https://braspag.github.io//manual/cartao-protegido-api-rest
     */

    // Nome da aplicação
    'softDescriptor' => env('BRASPAG_SOFTDESCRIPTOR', env('APP_NAME')),

    // Ambiente
    'environment' => env('BRASPAG_ENVIRONMENT', 'sandbox'),

    // ID do merchant
    'merchantId' => env('BRASPAG_MERCHANT_ID'),

    // ID do cliente
    'merchantKey' => env('BRASPAG_MERCHANT_SECRET'),

    // URL padrão
    'baseUrl' => [
        'sandbox' => 'https://apisandbox.braspag.com.br/',
        'production' => 'https://apisandbox.braspag.com.br/',
    ],

    // Timeout de requisições
    'timeout' => env('BRASPAG_TIMEOUT', 0),

    // Opção de proxy na comunicação
    'proxy' => env('BRASPAG_PROXY'),

    // Tempo de duração to token em cache (evita fazer autenticação para cada requisição solicitada indiferente do cliente)
    'tokenCachedTime' => env('BRASPAG_TOKEN_CACHE', 5),
];
