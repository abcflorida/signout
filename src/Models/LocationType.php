<?php

namespace Flw\Signout\Models;

use Backpack\CRUD\CrudTrait;
use Flw\Signout\Models\Location as Location;

/**
 * @property int $location_id
 * @property string $name
 */
class LocationType extends FlwModel {

    use CrudTrait;

    protected $table = 'location_type';
    protected $primaryKey = 'id';
    protected $errors;

    protected $fillable = ['name','active','needs_buddy','restricted_from_role'];

    protected $rules = array(
        'name' => 'required|string'
    );

    protected $messages = array(
        'name.required' => 'Name of Location is required'
    );

    public function locations () {
        return $this->hasMany( Location::class, 'location_type_id', 'id');
    }

}