<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['cat_name', 'cat_order', 'cat_del'];



    public function produtos() {
        return $this->hasMany(Produto::class);
    }
}
