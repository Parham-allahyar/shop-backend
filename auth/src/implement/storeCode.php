<?php

namespace Auth\implement;
use Illuminate\Support\Facades\Cache;


class storeCode
{
    public function saveCode($code, $userId)
    {
        Cache::put($code, $userId, 120);
    }

    public function getCode($code)
    {
        $userId = Cache::get($code);
        return $userId;
    }
}
