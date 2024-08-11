<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMemberRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'team_member_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_member_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
