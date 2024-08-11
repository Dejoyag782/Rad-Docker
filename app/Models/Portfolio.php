<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'thumbnail',
        'sub_header',
    ];

    public function portfolioFiles()
    {
        return $this->belongsToMany(Service::class, 'name', 'desc');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
