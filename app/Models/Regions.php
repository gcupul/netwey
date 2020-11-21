<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
   protected $table = 'regions';
   protected $primaryKey = 'id_reg';
   protected $fillable = ['description', 'status'];
   public $timestamps = false;

   public function communes()
   {
       return $this->hasMany('App\Model\Communes','id_reg', 'id_reg');
   }

   public function customers()
   {
       return $this->hasMany('App\Model\Customers','id_reg', 'id_reg');
   }
}