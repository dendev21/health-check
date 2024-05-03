<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    public const FIELD_OWNER = 'owner';

    protected $table = 'access_log';

    public function setOwner(string $owner): self
    {
        $this->setAttribute(self::FIELD_OWNER, $owner);

        return $this;
    }
}
