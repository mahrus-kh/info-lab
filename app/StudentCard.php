<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCard extends Model
{
    protected $fillable = [
        'nim', 'name', 'prodi_id', 'place_of_birth', 'date_of_birth', 'address', 'city', 'phone', 'etc', 'photo_image',
        'photo_number', 'card_status', 'admin_id', 'print_status', 'taken_status', 'admin_taken_id', 'taken_at'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
