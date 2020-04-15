<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogue';

    public function produit() {
    	return $this->hasMany('App\Models\Produit', 'catlogue_idcatalogue', 'idcatalogue');
	}
}
