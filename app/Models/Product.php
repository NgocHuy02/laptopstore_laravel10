<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'status',
        'category_id',
        'brand_id'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

}