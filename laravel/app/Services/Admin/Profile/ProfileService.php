<?php

namespace App\Services\Admin\Profile;

use App\Models\Admin;
use App\Services\Admin\BaseService;

class ProfileService extends BaseService
{
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

}
