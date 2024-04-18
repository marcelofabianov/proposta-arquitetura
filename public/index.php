<?php

declare(strict_types=1);

require __DIR__.'/../src/main.php';

try {
    main();
} catch (Throwable $exception) {
    echo $exception->getMessage();
}
