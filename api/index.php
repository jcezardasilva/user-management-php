<?php

namespace api;

require __DIR__ . '/../config.php';

try {
    $api = new Application();
    $api->open();
} catch (\Throwable $th) {
    error_log("Erro ao iniciar aplicação.", 3, __DIR__ . "/../errors.log");
}