<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.11.15
 * Time: 12:00
 */

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Slider extends Eloquent implements StaplerableInterface {

    use EloquentTrait;

    protected $table = 'slider';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('slider', [
            'styles' => [
                'thumb' => '1000x400',
            ]
        ]);

        parent::__construct($attributes);
    }

}