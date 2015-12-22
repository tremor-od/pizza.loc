<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.11.15
 * Time: 14:56
 */

class ProductSize extends Eloquent  {

    protected $table = 'product_size';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function size(){
        return $this->belongsTo('Size', 'size_id', 'id');
    }
}

