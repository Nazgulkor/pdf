<?php

return array(
    '/' => ['controller' => 'HomeController', 'action' => 'index'],
    '/save-file' => ['controller' => 'HomeController', 'action' => 'store'],
    '/redact' => ['controller' => 'RedactController', 'action' => 'index'],
    '/redact/create' => ['controller' => 'RedactController', 'action' => 'store'],
    '/redact/mail' => ['controller' => 'RedactController', 'action' => 'mail'],
);