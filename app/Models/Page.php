<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'active', 'slug', 'city_id', 'published'
    ];
    public function seo()
    {
        return $this->morphOne('App\Models\Seo\Seo','pageable');
    }
    public function content()
    {
        return $this->morphOne('App\Models\Page\PageContent','pageable');
    }
}
