<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    protected static function boot()
{
    parent::boot();

    static::creating(function ($category) {
        $category->slug = \Str::slug($category->name);
    });
}

}
