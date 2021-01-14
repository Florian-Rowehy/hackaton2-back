<?php

namespace App\Controller;

use App\Repository\TileRepository;
use App\Repository\UserRepository;
use App\Service\MoveManager;
use Doctrine\ORM\EntityManagerInterface;
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
     * @param UserRepository $userRepository
     * @return Response
     */
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->json($users, 200, [], ['groups' => ['user','lunch']]);
    }

    /**
     * @Route("/listen", name="listen")
     */
    public function listen(MessageBusInterface $bus, SerializerInterface $serializer, UserRepository $userRepository)
    {
        $users = $userRepository->findAll();
        $update = new Update(
            'users',
            $serializer->serialize($users, 'json', ['groups' => ['user','lunch']])
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

    /**
     * @Route("/move/{id}/{x}/{y}", name="move", requirements={"x"="[0-9]+", "y"="[0-9]+"}, methods={"GET"})
     */
    public function move(int $id, int $x, int $y, EntityManagerInterface $em, TileRepository $tileRepository, UserRepository $userRepository)
    {
        $user = $userRepository->findOneById($id);
        if ($tileRepository->isMovableTile($x, $y)) {
            $user->setCoordX($x);
            $user->setCoordY($y);
            $em->flush();
            return $this->redirectToRoute('user_listen');
        }
        return $this->json(false);
    }
}
