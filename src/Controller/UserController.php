<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(UserRepository $userRepository): Response
    {
        $user = $userRepository->findAll();
        return $this->json($user);
    }

    public function __invoke(PublisherInterface $publisher, SerializerInterface $serializer): Response
    {
        $update = new Update(
            $this->generateUrl('user_index'),
            json_encode(['status' => 'OutOfStock'])
        );

        // The Publisher service is an invokable object
        $publisher($update);

        return new Response('published!');
    }
}
