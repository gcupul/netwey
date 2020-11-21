<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
   protected $table = 'customers';
   public $incrementing = false;
   protected $primaryKey = ['dni','id_reg', 'id_com'];
   public $timestamps = false;
   public $dates = ["date_reg"];
   protected $fillable = [
       'dni',
       'id_reg',
       'id_com',
       'email', 
       'name', 
       'last_name', 
       'address',
       'date_reg',
       'status'
    ];
}
