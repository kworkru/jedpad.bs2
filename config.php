<?php
$cbConfig = [
    "rucaptcha" => [
        "key" => "ccca532951426427e0afa43b710f683f"
    ],
    "unisend" =>[
        "host" => "https://api.unisender.com/ru/api",
        "api_key" => "67qkxk1xyqe87ekasq37w1ri1ej3hprfuqrf8tna",
        "list_ids" => "10093335",
        "sender" => [
            "name" => "Checkauto VIN",
            "email" => "newsletter@jedpad.com"
        ],
        "templates"=>[
            "fast"=>"mail/templates/fast_jedpad.html",
            // "fast"=>"mail/templates/text.html",
            // "fast"=>"1502561",
            "full"=>"1502561",
        ],

    ],
    "sendpulse" =>[
        "host" => "https://api.unisender.com/ru/api",
        "api_key" => "7c2144e6ed7c758a968346dd578c0a4e",
        "secure" => "885044efa35ac86b5dd8f970ed4de036",
        "list_ids" => "1175986",
        "sender" => [
            "name" => "Checkauto VIN",
            // "email" => "newsletter@jedpad.com"
            "email" => "info@prof-context.ru"
        ],
        "templates"=>[
            "fast"=>"mail/templates/fast_jedpad_sp.html",
            // "fast"=>"mail/templates/text.html",
            // "fast"=>"1502561",
            // "full"=>"1502561",
        ],

    ],
    "clientBase" => [
        "key" => "d9db2c21bc7497ab48749655c430995a",
        "host" =>"http://v2.prof-context.ru/api",
        "version" =>"2.0",
        "login" => "admin",
        "reportTable" => "380"
    ],
    "clientBase_local" => [
        "key" => "615cdb1dd19ef65bcb7c81a97360abc0",
        "host" =>"http://cb.bs2/api",
        "version" =>"1.0",
        "login" => "admin",
        "reportTable" => "280"
    ]
];
?>
