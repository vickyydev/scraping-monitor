<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Source extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'url', 'active'];

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', true);
        });
    }

    public function maps()
    {
        return $this->hasMany(Map::class);
    }
}
