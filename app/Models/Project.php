<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['slug'];
    protected $appends = ['image_url'];
    protected function getImageUrlAttribute()
    {
        return $this->cover_image ? asset("storage/$this->cover_image") : "https://via.placeholder.com/150?text=Immagine+mancante";
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
