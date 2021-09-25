<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'companies_id',
        'email',
    ];

    public function Companies()
    {
        return $this->belongsTo(Companies::class);
    }
}
