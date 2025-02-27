<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
