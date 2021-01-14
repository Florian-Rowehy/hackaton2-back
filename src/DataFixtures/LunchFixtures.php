<?php

namespace App\DataFixtures;

use App\Entity\Lunch;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LunchFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $lunches = [
            'Tartiflette pur reblochon' => [
                'author' => 'user_0',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Tartiflette_4.jpg',
                'content' => 'J\'me suis fait une délicieuse tartiflette, sans crème bien sûr, avec un reblochon entier ! Je vous laisse juger sur l\'image, méga bon !',
                'rate' => 4,
            ],
            'Tartiflette aux rattes' => [
                'author' => 'user_1',
                'image' => 'https://recettescookeo.com/wp-content/uploads/2015/11/Tartiflette-Maison.jpg',
                'content' => 'Le coeur de la tartif, ça reste les patates. Ici pas de concetion, les rattes s\'imposent. Elle devient alors plus légère et digeste, tout en restant gourmande ! le must.',
                'rate' => 5,
            ],
            'La tartif' => [
                'author' => 'user_4',
                'image' => 'https://www.hervecuisine.com/wp-content/uploads/2016/12/recette-tartiflette-1024x683.jpg.webp',
                'content' => 'De mon coté je me suis fait une tartiflette solo, pas mal, mais pas assez de lardons je pense. C\'est bon, mais je reste pas trop fan...',
                'rate' => 2,
            ],
            'La veganiflette' => [
                'author' => 'user_5',
                'image' => 'https://serial-cooker.com/wp-content/uploads/2015/03/tartiflette-vegan-2.jpg',
                'content' => 'Sans grande surprise j\'ai opté pour la version végane, mais le goût était carrément au rdv !',
                'rate' => 3,
            ],
        ];

        foreach ($lunches as $name => $data) {
            $user =
            $lunch = new Lunch();
            $lunch
                ->setName($name)
                ->setAuthor($this->getReference($data['author']))
                ->setImage($data['image'])
                ->setContent($data['content'])
                ->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2020-12-11"))
                ->setRate($data['rate'])
            ;
            $manager->persist($lunch);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
