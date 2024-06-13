<?php

namespace umk0\HeadHunterApi\EndPoints;

use umk0\HeadHunterApi\Traits\HasAll;
use umk0\HeadHunterApi\Traits\HasView;
use umk0\HeadHunterApi\Traits\InvitedNegotiations;

class Negotiations extends Endpoint
{
    const RESOURCE = 'negotiations';

    use HasView, HasAll, InvitedNegotiations;

    public function active(array $pagination = [])
    {
        return $this->getResource('active', $pagination);
    }

    /**
     * @param string $id
     * @param array $pagination
     * @return array
     */
    public function messages($id, array $pagination = [])
    {
        return $this->getResource($id . '/messages', $pagination);
    }


    public function view($negotiationId)
    {
        return $this->getResource($negotiationId);
    }

    /**
     * @param int $id
     * @param string $message
     * @return mixed
     */
    public function message($id, $message)
    {
        return $this->postResource($id, ['message' => $message]);
    }
}
