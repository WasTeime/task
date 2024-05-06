<?php

namespace App\Models;
class Loan
{
    public string $name;
    public float $sum;
    public int $crated_at;

    public function __construct(string $name, float $sum, int $crated_at)
    {
        $this->name = $name;
        $this->sum = $sum;
        $this->crated_at = $crated_at;
    }
}
