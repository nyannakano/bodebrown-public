<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Produto extends Model {
    use HasFactory;
    protected $fillable = ['pro_name', 'pro_price', 'pro_description', 'cat_id', 'pro_order', 'pro_image', 'check'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}