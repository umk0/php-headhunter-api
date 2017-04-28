<?php

namespace seregazhuk\HeadHunterApi\EndPoints;

class Artifacts extends Endpoint
{
    const RESOURCE = 'artifacts';

    public function photos()
    {
        return $this->getResource('photo');
    }

    public function portfolio()
    {
        return $this->getResource('portfolio');
    }

    public function editPhoto($id, $attributes)
    {
        return $this->putResource($id, $attributes);
    }

    public function deletePhoto($id)
    {
        $this->deleteResource($id);
    }

    public function upload($type, $description, $file)
    {
        $data = [
            'type'        => $type,
            'description' => $description,
            'file'        => $file,
        ];

        $this->postResourceFile('', $data);
    }
}