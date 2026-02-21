<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/config/bootstrap.php';
require_once __DIR__ . '/../app/config/database.php';

try {
    $pdo = db();
    $row = $pdo->query('SELECT 1 AS ok')->fetch();
    echo "DB OK: " . ($row['ok'] ?? 'no');
} catch (Throwable $e) {
    http_response_code(500);

    // Log the real error (job-ready behavior)
    error_log('[db-test] ' . $e->getMessage());

    // Show generic message to users
    echo "DB ERROR";
}<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/config/bootstrap.php';
require_once __DIR__ . '/../app/config/database.php';

try {
    $pdo = db();
    $stmt = $pdo->query('SELECT 1 as ok');
    $row = $stmt->fetch();
    echo "DB OK: " . ($row['ok'] ?? 'no');
} catch (Throwable $e) {
    http_response_code(500);
    echo "DB ERROR: " . $e->getMessage();
}

