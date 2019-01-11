<?php

namespace Flw\Signout\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION
use Flw\Signout\Requests\LocationCrudRequest as StoreRequest;
use Flw\Signout\Requests\LocationCrudRequest as UpdateRequest;

class LocationCrudController extends CrudController
{

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('Flw\Signout\Models\Location');
        $this->crud->setEntityNameStrings('location', 'locations');
        $this->crud->setRoute(config('backpack.base.route_prefix').'/location');

        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => 'location',
                'type'  => 'text',
            ],
            [ // n-n relationship (with pivot table)
                'label'     => 'type', // Table column heading
                'type'      => 'select',
                'name'      => 'location_type_id', // the method that defines the relationship in your Model
                'entity'    => 'locationType', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('Flw\Signout\Models\LocationType'), // foreign key model
            ],
            [
                'name'  => 'active',
                'label' => 'active',
                'type'  => 'text',
            ],
            [
                'name'  => 'address1',
                'label' => 'address',
                'type'  => 'text',
            ],
            [
                'name'  => 'city',
                'label' => 'city',
                'type'  => 'text',
            ],
        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => 'location',
                'type'  => 'text',
            ],
            [ // n-n relationship (with pivot table)
                'label'     => 'Location Type', // Table column heading
                'type'      => 'select',
                'name'      => 'location_type_id', // the db column of the foreign key
                'entity'    => 'locationType', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('Flw\Signout\Models\LocationType'), // foreign key model

            ],
            [
                'name'  => 'active',
                'label' => 'active',
                'type'  => 'text',
            ],
            [
                'name'  => 'address1',
                'label' => 'address',
                'type'  => 'text',
            ],
            [
                'name'  => 'city',
                'label' => 'city',
                'type'  => 'text',
            ],
            [
                'name'  => 'state',
                'label' => 'state',
                'type'  => 'text',
            ],
            [
                'name'  => 'lat',
                'label' => 'latitude',
                'type'  => 'float',
            ],
            [
                'name'  => 'long',
                'label' => 'longitude',
                'type'  => 'float',
            ],


        ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
