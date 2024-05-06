<?php

namespace App\Models;
class Loan
{
    public int $id;
    public string $name;
    public float $sum;
    public int $created_at;

    public function __construct(int $id, string $name, float $sum, int $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sum = $sum;
        $this->created_at = $created_at;
    }

    public function toJson()
    {
        return json_encode($this);
    }
}
