<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';


	public function produit() {
		return $this->belongsToMany('App\Model\Produit', 'Basket_has_Produit', 'Produit_id');
	}
	public function users() {
		return $this->belongsTo('App\Providers\Users', 'users_id');
	}
}
