<?php

namespace Pringgojs\LaravelItop\Services\Builders;

interface PayloadBuilderInterface
{
    public static function payload(array $fields = [], bool $asJson = false);
}
