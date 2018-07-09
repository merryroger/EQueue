<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Log extends Model
{
    protected $guarded = [];
    protected $fillable = ['id', 'task_id', 'status', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function scopeZeroStatus($query)
    {
        return $query->where('status', 0);
    }

    public function scopeTreatedStatus($query)
    {
        return $query->where('status', 1);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value;
    }

}
