<?php

namespace App\Services;

use Hashids\Hashids;

class HashidsService
{
    protected $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids(env('HASHIDS_SALT'), 12);
    }

    public function encode($id)
    {
        return $this->hashids->encode($id);
    }

    public function decode($hash)
    {
        $result = $this->hashids->decode($hash);

        return $result[0] ?? null;
    }
}
