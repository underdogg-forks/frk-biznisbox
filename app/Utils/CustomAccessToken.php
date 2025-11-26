<?php

namespace App\Utils;

use App\Helpers\CustomClaimsAccessTokenTrait;
use Laravel\Passport\Bridge\AccessToken;

class CustomAccessToken extends AccessToken
{
    use CustomClaimsAccessTokenTrait;
}
