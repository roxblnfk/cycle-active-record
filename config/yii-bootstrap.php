<?php

declare(strict_types=1);

use Cycle\ActiveRecord\StaticOrigin;

return [
    'cycle-active-record' => Closure::fromCallable([StaticOrigin::class, 'setContainer']),
];
