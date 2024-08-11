<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Service extends Model
    {
        use HasFactory;

        protected $fillable = [
            'name',
            'desc',
            'icon', // Assuming the Service model has a 'name' attribute
        ];

        public function portfolios()
        {
            return $this->hasMany(Portfolio::class);
        }
        public function roles()
        {
            return $this->hasMany(Role::class);
        }
    }
