<?php

namespace App\Models;

use App\Models\User;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produit extends Model
{
    public $fillable = ['designation', 'prix', 'description', 'quantite', 'category_id', 'image'];
    use HasFactory;

    public function category()
    {
        
    return $this->belongsTO (category::class);
    }

    public function users()
    {
      return $this->belongsTo(User::class);

    }

}
