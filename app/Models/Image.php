<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'imageName'
    ];
    private mixed $name;

    public function property() : BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function imageURL() : string
    {
        return Storage::url($this->imageName);
    }
}
