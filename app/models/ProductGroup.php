<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.11.15
 * Time: 14:56
 */

class ProductGroup extends Eloquent  {

    protected $table = 'product_group';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function group(){
        return $this->belongsTo('Group', 'group_id', 'id');
    }
}

