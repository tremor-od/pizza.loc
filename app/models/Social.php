<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.11.15
 * Time: 12:00
 */

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Social extends Eloquent implements StaplerableInterface {

    use EloquentTrait;

    protected $table = 'social';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'thumb' => '24x23',
            ]
        ]);

        parent::__construct($attributes);
    }

}