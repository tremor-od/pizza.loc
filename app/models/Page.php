<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 15:50
 */

class Page extends Eloquent {

    protected $table = 'page';
    protected $primaryKey = 'id';
    protected $guarded = array();


    public function place(){
        return $this->hasOne('Place', 'id', 'place_id');
    }
}