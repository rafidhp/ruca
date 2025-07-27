<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    use HasFactory;

    protected $table = 'psikologs';

    protected $fillable = [
        'no_hp',
        'spesialisasi',
        'str_doc',
        'sip_doc',
        'education',
        'photo',
        'description',
        'user_id',
    ];

    public function getHashidAttribute()
    {
        return app(\App\Services\HashidsService::class)->encode($this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
