<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communes extends Model
{
   protected $table = 'communes';
   protected $primaryKey = 'id_com';
   protected $fillable = ['id_reg', 'description', 'status'];
   public $timestamps = false;

   public function customers()
   {
       return $this->hasMany('App\Model\Customers','id_com');
   }
}