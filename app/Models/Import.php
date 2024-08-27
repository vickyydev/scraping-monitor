<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'map_id', 'source_id', 'start_time', 'status', 'error_message',
        'end_time', 'articles_processed'
    ];

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }
}
