<?php

/**
 * component collection
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * model collection
 */

use App\Models\User\Access\Access;

/**
 * checking level user
 */
function userAccess()
{
    /**
     * init id role
     */
    $uuidAccess = Auth::user()->uuid_access;

    /**
     * return output
     */
    return Access::where('uuid_access', $uuidAccess)->first();
}
