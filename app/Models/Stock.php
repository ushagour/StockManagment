<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Stock extends Model
{
 
    use SoftDeletes, HasFactory;

    public $table = 'stocks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_id',
        'asset_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'current_stock',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');

    }


    protected function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    protected function team()
    {
        return $this->belongsTo(Team::class);
    }

}
