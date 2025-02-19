<?php

namespace App\Serializer;

use App\Entity\Event;
use App\Entity\Location;
use Symfony\Component\Routing\RouterInterface;

class CircularReferenceHandler
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function __invoke($object)
    {
        switch($object)
        {
            case $object instanceof Location:
                return $this->router->generate('api_map', ['location'=> $object->getName()]);
            case $object instanceof Event:
                return $this->router->generate('api_map', ['location'=> $object->getName()]);
        }
       return $object->getId();
    }
}
