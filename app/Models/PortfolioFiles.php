<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'service_id',
        'project_team_ids',
        'file_type',
        'file_path',
        'project_name',
        'sub_heading',
        'desc',
        'date',
        'client',
    ];
    
    public function teams()
    {
        return $this->belongsTo(Team::class, 'name', 'photo', 'linked_in');
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
