<?php

namespace App\Serializer;

use App\Entity\Workshop;
use App\Entity\Concert;
use App\Entity\Location;
use App\Entity\Performance;
use RuntimeException;
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
            case $object instanceof Concert:
                return $this->router->generate('api_concert', ['location'=> $object->getName()]);
            case $object instanceof Workshop:
                return $this->router->generate('api_map', ['location'=> $object->getId()]);
            case $object instanceof Performance:
                return $this->router->generate('api_map', ['location'=> $object->getId()]);
        }
       return $object->getId();
    }
}
