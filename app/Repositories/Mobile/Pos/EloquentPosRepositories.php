<?php

namespace App\Repositories\Mobile\Pos;

/**
 * component collection 
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

/**
 * models collection
 */


/**
 * helpers Collection
 */

use App\Helpers\CheckerHelpers;

/**
 * repositories collection
 */

use App\Repositories\Mobile\Pos\PosRepositories;

class EloquentPosRepositories implements PosRepositories
{

    private $initCheckerHelper;
    protected $path;

    public function __construct(
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * static value
         */
        $this->path = url('public/assets/images/users/');


        /**
         * initialize component
         */
        date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));
    }
}
