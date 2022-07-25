<?php

namespace App\Http\Dto;

abstract class Base
{
    abstract public static function build(array $data): self;

    public function toArray(): array
    {
        return json_decode((string)json_encode($this), true);
    }
}
