<?php

namespace seregazhuk\HeadHunterApi\EndPoints;

class Me extends Endpoint
{
    const RESOURCE = 'me';

    public function info()
    {
        return $this->getResource();
    }

    /**
     * @param bool $val
     */
    public function setIsInSearch($val = true)
    {
        $this->postResource('', ['is_in_search' => $val]);
    }

    /**
     * @param string $lastName
     * @param string $firstName
     * @param string $middleName
     */ 
    public function editName($lastName, $firstName, $middleName)
    {
        $data = [
            'last_name'   => $lastName,
            'first_name'  => $firstName,
            'middle_name' => $middleName
        ];

        $this->postResource('', $data);
    }
}
