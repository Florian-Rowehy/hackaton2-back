<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            'baloo',
            'auchapeau',
            'boubou',
            'takemyenergy',
            'nico',
            'alex'
        ];
        foreach ($users as $username) {
            $user = new User();
            $user
                ->setUsername($username)
                ->setPassword($this->passwordEncoder->encodePassword($user, 'password'))
                ->setAvatar('https://img.favpng.com/18/19/24/nyan-cat-youtube-png-favpng-G1cs1DiEzDQhHaAgXduVYB2Dp.jpg')
            ;
            $manager->persist($user);
        }
        $manager->flush();
    }
}
