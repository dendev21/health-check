<?php

declare(strict_types=1);

namespace App\Components;

interface CheckableInterface
{
    public function isOk(): bool;
}
