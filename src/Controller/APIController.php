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
        private Serialize $ser
    ) {
    }
    
    #[Route('/licencies', name: 'app_licencies')]
    public function getLicencies():Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/licencies/');
        $objJson= $this->ser->cleanResponse($response->getContent());

        return new Response($objJson);
    }
    


    #[Route('/licencie/{numLicence}', name: 'app_licencies_numlicence')]
    public function getLicencie(int $numLicence):Response
    {
        $objJson='{}';

        try{
            $statusCode = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/licencies/'. $numLicence)->getStatusCode();
            if($statusCode!='404'){
                $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/licencies/'. $numLicence);
                $objJson= $this->ser->cleanResponse($response->getContent());
            }
            
        }catch(Exception $ex){  
        }

        return new Response($objJson);
    }

   
     #[Route('/clubs', name: 'app_clubs')]
    public function getClubs():Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/clubs/');
        $objJson= $this->ser->cleanResponse($response->getContent());
        
        return new Response($objJson);
    }


    #[Route('/club/{id}', name: 'app_clubs_id')]
    public function getClub($id):Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/clubs/'.$id);
        $objJson= $this->ser->cleanResponse($response->getContent());

        return new Response($objJson);
    }


    #[Route('/qualites', name: 'app_qualites')]
    public function getQualites():Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/qualites/');
        $objJson= $this->ser->cleanResponse($response->getContent());

        return new Response($objJson);
    }


       #[Route('/qualite/{id}', name: 'app_qualite_id')]
    public function getQualite($id):Response
    {
        $response = $this->client->request('GET', 'http://10.10.2.148/maisondesliguesAPI/public/index.php/api/qualites/'.$id);
        $objJson= $this->ser->cleanResponse($response->getContent());

        return new Response($objJson);
    }
    

    
    
    
}

