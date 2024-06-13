<?php

namespace umk0\HeadHunterApi\EndPoints;

use umk0\HeadHunterApi\Traits\HasAll;

class Metro extends Endpoint
{
    use HasAll;

    const RESOURCE = 'metro';

    /**
     * @param int $cityId
     * @return array
     */
    public function forCity($cityId)
    {
        return $this->getResource($cityId);
    }
}
