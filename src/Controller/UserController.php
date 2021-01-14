<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/users", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->json($users);
    }

    /**
     * @Route("/listen", name="listen")
     */
    public function listen(MessageBusInterface $bus, SerializerInterface $serializer, UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $update = new Update(
            'users',
            $serializer->serialize($users, 'json')
        );
        $bus->dispatch($update);
        return new Response('published!');
    }


    public function __invoke(PublisherInterface $publisher, SerializerInterface $serializer, UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $update = new Update(
            'users',
            $serializer->serialize($users, 'json')
        );

        // The Publisher service is an invokable object
        $publisher($update);

        return new Response('published!');
    }
}
