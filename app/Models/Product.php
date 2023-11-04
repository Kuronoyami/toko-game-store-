<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'description', 'slug'
    ];

    protected $hidden = [
        
    ];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
             });
         });
        
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

         
    }  

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
    
    public function review(){
        return $this->hasMany(Review::class, 'products_id', 'id');
    }
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
