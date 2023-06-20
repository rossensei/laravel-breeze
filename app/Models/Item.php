<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
        'itemphoto'
    ];

    protected $appends = ['itemphoto_url'];

    public function getItemPhotoUrlAttribute() {
        $url = $this->itemphoto ? asset("images/item_images/" . $this->itemphoto) : "https://512pixels.net/downloads/macos-wallpapers-thumbs/10-14-Night-Thumb.jpg";
        return $url;
    }
}
