<?php

namespace App\DataFixtures;

use App\Entity\Tile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $map = [
            ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
            ['x', ' ', '1', ' ', '1', ' ', 'x', ' ', ' ', ' ', ' ', 'x',],
            ['x', ' ', 't', 't', 't', ' ', 'x', ' ', ' ', ' ', ' ', 'x',],
            ['x', ' ', 't', 't', 't', ' ', 'x', ' ', '2', ' ', ' ', 'x',],
            ['x', ' ', ' ', '1', ' ', ' ', ' ', 't', 't', 't', ' ', 'x',],
            ['x', ' ', ' ', ' ', ' ', ' ', 'x', 't', 't', 't', ' ', 'x',],
            ['x', ' ', ' ', ' ', ' ', ' ', 'x', '2', ' ', '2', ' ', 'x',],
            ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
        ];
        $ySize = count($map);
        $xSize = count($map[0]);
        for ($y= 0; $y<$ySize; $y++) {
            for ($x = 0; $x<$xSize; $x++) {
                $type = $map[$y][$x];
                $room = null;
                switch ($type) {
                    case 'x': $type = 'wall'; break;
                    case '1':
                    case '2':
                        $room = $type;
                        $type = 'chair';
                        break;
                    case 't': $type = 'table'; break;
                    default: $type = 'floor'; break;
                }

                $tile = new Tile();
                $tile
                    ->setType($type)
                    ->setRoom($room)
                    ->setCoordY($y)
                    ->setCoordX($x)
                ;
                $manager->persist($tile);
            }
        }
        $manager->flush();
    }
}
