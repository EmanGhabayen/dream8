<?php

namespace App\Models;


class Admin extends BaseAuthenticatable
{
    protected $guard = 'admin';
}
