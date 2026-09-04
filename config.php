<?php
$env = [];
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        [$key, $value] = array_pad(explode('=', $line, 2), 2, '');
        $env[trim($key)] = trim($value);
    }
}

function app_env($key, $default = '') {
    global $env;
    return isset($env[$key]) ? $env[$key] : $default;
}

function app_db_config() {
    return [
        'host' => app_env('DB_HOST', 'localhost'),
        'username' => app_env('DB_USERNAME', 'root'),
        'password' => app_env('DB_PASSWORD', ''),
        'name' => app_env('DB_NAME', 'agriculture_portal'),
    ];
}
?>
