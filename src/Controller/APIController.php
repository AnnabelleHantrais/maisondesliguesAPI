<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Licencie;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use App\Entity\Club;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use App\Service\Serialize;

class APIController extends AbstractController
{
 
    public function __construct(
        private HttpClientInterface $client,
        private SerializerInterface $serializer,
        private Serialize $ser
    ) {
    }
    
    #[Route('/licencies', name: 'app_licencies')]
    public function getLicencies():Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/licencies/');
        $responseRawJson= $response->getContent();
        $objJson= $this->ser->cleanResponse($responseRawJson);

        return new Response($objJson);
    }
    
    #[Route('/licencie/{id}', name: 'app_licencies_id')]
    public function getLicencie($id):Response
    {
        
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/licencies/'.$id);
        $responseRawJson= $response->getContent();
        // dump($responseRawJson);
        $objJson= $this->ser->cleanResponse($responseRawJson);

        return new Response($objJson);
    }
    
     #[Route('/clubs', name: 'app_clubs')]
    public function getClubs():Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/clubs/');
        $responseRawJson= $response->getContent();
        $objJson= $this->ser->cleanResponse($responseRawJson);

        return new Response($objJson);
    }


    #[Route('/club/{id}', name: 'app_clubs_id')]
    public function getClub($id):Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/clubs/'.$id);
        $responseRawJson= $response->getContent();
        $objJson= $this->ser->cleanResponse($responseRawJson);

        return new Response($objJson);
    }


    #[Route('/qualites', name: 'app_qualites')]
    public function getQualites():Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/qualites/');
        $responseRawJson= $response->getContent();
        $objJson= $this->ser->cleanResponse($responseRawJson);

        return new Response($objJson);
    }


       #[Route('/qualite/{id}', name: 'app_qualite_id')]
    public function getQualite($id):Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/qualites/'.$id);
        $responseRawJson= $response->getContent();
        $objJson= $this->ser->cleanResponse($responseRawJson);

        return new Response($objJson);
    }
    
    
}

