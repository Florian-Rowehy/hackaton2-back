<?php

namespace App\Controller;

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

    /**
     * @Route("/move/{x}/{y}", name="move", requirements={"x"="[0-9]", "y"="[0-9]"}, methods={"POST"})
     * @param int $x
     * @param int $y
     * @param UserRepository $ur
     * @param EntityManagerInterface $em
     * @param MoveManager $moveManager
     * @return Response
     */
    public function move(int $x, int $y, UserRepository $ur, EntityManagerInterface $em, MoveManager $moveManager): Response
    {
        $user = $ur->findOneBy(['username' => $this->getUser()->getUsername()]);
        $user->setCoordX($x);
        $user->setCoordY($y);

        if ($moveManager->tileExists($user->getCoordX(), $user->getCoordY())) {
            $em->persist($user);
            $em->flush();
        }

        return $this->redirectToRoute('tile_index');
    }
}
