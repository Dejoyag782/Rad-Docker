<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'role_name',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_member_roles', 'role_id', 'team_member_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
