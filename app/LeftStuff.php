<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeftStuff extends Model
{
    protected $fillable = [
        'stuff_name', 'location_id', 'who_posted', 'etc', 'admin_id',
        'status', 'who_taken', 'admin_taken_id', 'taken_at'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}