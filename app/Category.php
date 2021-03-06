<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected   $table = 'categories';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /** 
     * 
     * 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description', 'order', 'active', 'image'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = ['active' => 'boolean'];

    public function products() {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
