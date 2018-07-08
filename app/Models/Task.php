<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $fillable = ['id', 'name', 'counter'];

    public function scopeIsValidId($query, $taskId)
    {
        return ($taskId > 0 && ($taskId <= $query->count()));
    }

}
