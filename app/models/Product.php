<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.11.15
 * Time: 12:04
 */

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Product extends Eloquent implements StaplerableInterface {

    use EloquentTrait;

    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'thumb' => '300x270',
            ]
        ]);

        parent::__construct($attributes);
    }

    public function sizeList(){
        return $this->hasMany('ProductSize', 'product_id', 'id');
    }

    public function groupList(){
        return $this->hasMany('ProductGroup', 'product_id', 'id');
    }
}