<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Map extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'url', 'source_id', 'active'];

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', true);
        });
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
