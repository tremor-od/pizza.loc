<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.11.15
 * Time: 14:40
 */

class Place extends Eloquent  {

    protected $table = 'place';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function pageList(){
        return $this->hasMany('Page', 'place_id', 'id');
    }
}