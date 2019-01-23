<?php
/**
 * Created by PhpStorm.
 * User: abcflorida
 * Date: 12/27/2018
 * Time: 5:47 PM
 */

namespace Flw\Signout\Services;

use \Illuminate\Contracts\Validation\Validator as Validator;
use Flw\Signout\Models\Signout as Signout;

class Checkout
{

    /**
     * Get a validator for a contact.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'user_id'     => 'required|integer|max:100000000',
            'with_user_id'     => 'integer|max:100000000',
            'checkout_time' => 'required|date'
        ]);
    }

    public function create(array $data)
    {
        $data = [
            'user_id'     => $data['user_id'],
            'with_user_id' => $data['with_user_id'],
            'checkout_time'  => $data['checkout_time']
        ];

        return Signout::create($data);
    }


}