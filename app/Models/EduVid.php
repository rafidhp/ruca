<?php

namespace App\Models;

use App\Services\YoutubeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EduVid extends Model
{
    use HasFactory;

    protected $table = 'edu_vids';

    protected $fillable = [
        'title',
        'vid_link',
        'description',
        'upload_date',
        'user_id',
        'category_id',
    ];

    public function getYoutubeIdAttribute()
    {
        return app(YoutubeService::class)->extractVideoId($this->vid_link);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
