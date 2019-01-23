<?php

namespace Flw\Signout\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION
use Flw\Signout\Requests\LocationCrudRequest as StoreRequest;
use Flw\Signout\Requests\LocationCrudRequest as UpdateRequest;

class LocationTypeCrudController extends CrudController
{

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('Flw\Signout\Models\LocationType');
        $this->crud->setEntityNameStrings('locationtype', 'locations');
        $this->crud->setRoute(config('backpack.base.route_prefix').'/location-type');

        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => 'location',
                'type'  => 'text',
            ],
            [
                'name'  => 'active',
                'label' => 'active',
                'type'  => 'boolean',
            ]
            ,
            [
                'name'  => 'needs_buddy',
                'label' => 'Needs Buddy',
                'type'  => 'boolean',
            ]
            ,
            [
                'name'  => 'restricted_from_role',
                'label' => 'Restricted On Role',
                'type'  => 'text',
            ]
        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => 'location',
                'type'  => 'text',
            ],
            [
                'name'  => 'active',
                'label' => 'active',
                'type'  => 'radio',
                'options' => array(1=>'yes',0=>'no' )
            ],
            [
                'name'  => 'needs_buddy',
                'label' => 'Needs Buddy',
                'type'  => 'radio',
                'options' => [1=>'yes',0=>'no']
            ]
            ,
            [
                'name'  => 'restricted_from_role',
                'label' => 'Restricted On Role',
                'type'  => 'text',
            ]



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
