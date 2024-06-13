<?php

namespace umk0\HeadHunterApi\EndPoints;

use umk0\HeadHunterApi\Traits\HasAll;
use umk0\HeadHunterApi\Traits\HasView;

class SavedSearches extends Endpoint
{
    const RESOURCE = 'saved_searches/vacancies';

    use HasAll, HasView;
}
