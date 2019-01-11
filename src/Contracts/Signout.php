<?php
/**
 * Created by PhpStorm.
 * User: abcflorida
 * Date: 11/25/2018
 * Time: 7:59 AM
 */

namespace Flw\Signout\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;


interface Signout
{

    /**
     * A checkout record can have various locations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations(): BelongsToMany;


    /**
     * Find a checkout user by user_id
     *
     * @param integer $name
     *
     * @return \flw\Checkout\Contracts\Checkout
     *
     * @throws \Exception
     */
    public static function findByUserId(Integer $user_id ): self;

    /**
     * create a checkout record by user_id with args.
     *
     * @param integer $name
     * @param array $args
     *
     * @return \Spatie\Permission\Contracts\Role
     */
    public static function create(Integer $user_id, $args): self;

    public function addLocation ( Integer $checkout_id, $location_id ): Boolean;





}