<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'deck_id',
        'front_content',
        'back_content',
        'check',
        'note',
    ];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }
}
