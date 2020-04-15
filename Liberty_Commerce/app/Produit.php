<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produit';

    public function basket() {
    	return $this->belongsToMany('App\Model\Basket', 'Basket_has_Produit', 'Basket_idBasket', 'idBasket');
    }
    public function catalogue() {
        return $this->belongsTo('App\Model\Catalogue', 'catalogue_idcatalogue', 'idcatalogue');
    }    
}
