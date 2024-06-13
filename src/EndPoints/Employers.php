<?php

namespace umk0\HeadHunterApi\EndPoints;

use umk0\HeadHunterApi\Traits\EmployerManagers;
use umk0\HeadHunterApi\Traits\HasView;
use umk0\HeadHunterApi\Traits\Searchable;

class Employers extends Endpoint
{
    use Searchable, HasView, EmployerManagers;

    const RESOURCE = 'employers';
}
