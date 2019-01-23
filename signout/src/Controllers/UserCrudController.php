<?php

namespace Flw\Signout\Controllers;


use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as UC;
use Backpack\PermissionManager\app\Http\Requests\UserStoreCrudRequest as StoreRequest;
use Backpack\PermissionManager\app\Http\Requests\UserUpdateCrudRequest as UpdateRequest;
use Illuminate\Http\Request;

class UserCrudController extends UC
{


    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel(config('backpack.base.user_model_fqn'));
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.user'), trans('backpack::permissionmanager.users'));
        $this->crud->setRoute(config('backpack.base.route_prefix').'/user');
        $this->crud->enableExportButtons();

        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'url2',
                'id' => 'id'
            ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [
                'name'  => 'on_probation',
                'label' => 'Probation',
                'type'  => 'boolean',
            ],
            [
                'name'  => 'community_control',
                'label' => 'Community Control',
                'type'  => 'boolean',
            ],
            [ // n-n relationship (with pivot table)
               'label'     => trans('backpack::permissionmanager.roles'), // Table column heading
               'type'      => 'select_multiple',
               'name'      => 'roles', // the method that defines the relationship in your Model
               'entity'    => 'roles', // the method that defines the relationship in your Model
               'attribute' => 'name', // foreign key attribute that is shown to user
               'model'     => config('permission.models.role'), // foreign key model
            ],
            [ // n-n relationship (with pivot table)
               'label'     => trans('backpack::permissionmanager.extra_permissions'), // Table column heading
               'type'      => 'select_multiple',
               'name'      => 'permissions', // the method that defines the relationship in your Model
               'entity'    => 'permissions', // the method that defines the relationship in your Model
               'attribute' => 'name', // foreign key attribute that is shown to user
               'model'     => config('permission.models.permission'), // foreign key model
            ],
            [
                'name'  => 'phone',
                'label' => 'phone',
                'type'  => 'text',
            ],
        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'dob',
                'label' => 'DOB',
                'type'  => 'date',
            ],
            [
                'name'  => 'ssn',
                'label' => 'Social Security Number',
                'type'  => 'text',
            ],
            [
                'name'  => 'pin',
                'label' => 'Private Number used at signout ( 4 digits )',
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [
                'name'  => 'password',
                'label' => trans('backpack::permissionmanager.password'),
                'type'  => 'password',
            ],
            [
                'name'  => 'password_confirmation',
                'label' => trans('backpack::permissionmanager.password_confirmation'),
                'type'  => 'password',
            ],
            [
                'name'  => 'phone',
                'label' => 'phone',
                'type'  => 'text',
            ],
            [
                'name'  => 'entry_date',
                'label' => 'Entry Date',
                'type'  => 'date'
            ],
            [
                'name'  => 'program_retried_count',
                'label' => 'Times in VOH?',
                'type'  => 'number'
            ],
            [
                'name'  => 'on_probation',
                'label' => 'Probation',
                'type'  => 'radio',
                'options' => [1=>'yes',0=>'no']
            ],
            [
                'name'  => 'community_control',
                'label' => 'Community Control',
                'type'  => 'radio',
                'options' => [1=>'yes',0=>'no']
            ],
            [
                'name'  => 'probation_officer_name',
                'label' => 'Probation Officer Name',
                'type'  => 'text'
            ],

            [
                'name'  => 'rental_assistance',
                'label' => 'Rental Assistance',
                'type'  => 'radio',
                'options' => [1=>'yes',0=>'no']
            ],
            [
                'name'  => 'assistance_source',
                'label' => 'Assistance Source',
                'type'  => 'text'
            ],
            [
                'name'  => 'assistance_date',
                'label' => 'Assistance Date',
                'type'  => 'date'
            ],
            [
                'name'  => 'program_name',
                'label' => 'Program Name ( if any )',
                'type'  => 'text'
            ],
            [
                'name'  => 'emergency_contact_name',
                'label' => 'Emergency Contact Phone',
                'type'  => 'text'
            ],
            [
                'name'  => 'is_employed',
                'label' => 'Employed?',
                'type'  => 'radio',
                'options' => [1=>'yes',0=>'no']
            ],
            [
                'name'  => 'work_address',
                'label' => 'Work Address',
                'type'  => 'text'
            ],
            [
                'name'  => 'notes',
                'label' => 'Internal Client Notes',
                'type'  => 'textarea'
            ],


            [
            // two interconnected entities
            'label'             => trans('backpack::permissionmanager.user_role_permission'),
            'field_unique_name' => 'user_role_permission',
            'type'              => 'checklist_dependency',
            'name'              => 'roles_and_permissions', // the methods that defines the relationship in your Model
            'subfields'         => [
                    'primary' => [
                        'label'            => trans('backpack::permissionmanager.roles'),
                        'name'             => 'roles', // the method that defines the relationship in your Model
                        'entity'           => 'roles', // the method that defines the relationship in your Model
                        'entity_secondary' => 'permissions', // the method that defines the relationship in your Model
                        'attribute'        => 'name', // foreign key attribute that is shown to user
                        'model'            => config('permission.models.role'), // foreign key model
                        'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
                        'number_columns'   => 3, //can be 1,2,3,4,6
                    ],
                    'secondary' => [
                        'label'          => ucfirst(trans('backpack::permissionmanager.permission_singular')),
                        'name'           => 'permissions', // the method that defines the relationship in your Model
                        'entity'         => 'permissions', // the method that defines the relationship in your Model
                        'entity_primary' => 'roles', // the method that defines the relationship in your Model
                        'attribute'      => 'name', // foreign key attribute that is shown to user
                        'model'          => config('permission.models.permission'), // foreign key model
                        'pivot'          => true, // on create&update, do you need to add/delete pivot table entries?]
                        'number_columns' => 3, //can be 1,2,3,4,6
                    ],
                ],
            ],
        ]);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @param StoreRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $this->handlePasswordInput($request);

        return parent::storeCrud($request);
    }

    /**
     * Update the specified resource in the database.
     *
     * @param UpdateRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        $this->handlePasswordInput($request);

        return parent::updateCrud($request);
    }

    /**
     * Handle password input fields.
     *
     * @param Request $request
     */
    protected function handlePasswordInput(Request $request)
    {
        // Remove fields not present on the user.
        $request->request->remove('password_confirmation');

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', bcrypt($request->input('password')));
        } else {
            $request->request->remove('password');
        }
    }
}
