<?php

namespace Flw\Signout\Contracts;

Interface Location {

    /**
     * Find a location by its name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @throws \Spatie\Permission\Exceptions\PermissionDoesNotExist
     *
     * @return Permission
     */
    public static function findByName(string $name ): self;

    /**
     * Find a location by its id.
     *
     * @param int $id
     * @param string|null $guardName
     *
     * @throws \Spatie\Permission\Exceptions\PermissionDoesNotExist
     *
     * @return Permission
     */
    public static function findById(int $id): self;

    /**
     * Find or Create a permission by its name and guard name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @return Permission
     */
    public static function create(array $args): self;
}