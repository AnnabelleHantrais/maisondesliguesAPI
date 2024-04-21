<?php

namespace App\Service;


use App\Entity\Licencie;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use App\Entity\Club;
use App\Entity\Qualite;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class Serialize 
{

    public function cleanResponse($responseRawJson):string
    {
        $decoded = json_decode($responseRawJson, true);

        //retirer les champs inutiles
        unset($decoded['@context']);
        unset($decoded['@id']);
        unset($decoded['@type']);

        $decoded['numlicence'] = strval($decoded['numlicence']);
        
        $reencoded = json_encode($decoded);

        return $reencoded;
    }
    
     
    
}

