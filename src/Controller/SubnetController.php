<?php
namespace App\Controller;

use App\Repository\SubnetRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class SubnetController extends ApiController
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/subnets")
     */
    public function subnetsAction(SubnetRepository $subnetRepository)
    {
        $subnets = $subnetRepository->findAll();

        return new JsonResponse($this->serializer->serialize($subnets, 'json'), 200, [], true);
    }
}