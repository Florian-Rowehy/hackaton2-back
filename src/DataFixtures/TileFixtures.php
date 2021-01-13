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

        $tileTypes = [
            ['wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall'],
            ['wall','floor','floor','floor','seat','floor','wall','floor','floor','seat','seat','seat','floor','floor','wall','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','wall'],
            ['wall','floor','floor','table','table','table','wall','seat','floor','floor','floor','floor','floor','floor','wall','floor','floor','seat','floor','seat','floor','seat','floor','seat','floor','floor','wall'],
            ['wall','floor','floor','floor','floor','floor','wall','seat','floor','floor','floor','floor','seat','floor','wall','floor','floor','table','table','table','table','table','table','table','floor','floor','wall'],
            ['wall','seat','floor','seat','floor','floor','wall','seat','floor','floor','floor','floor','table','table','wall','floor','floor','table','table','table','table','table','table','table','floor','floor','wall'],
            ['wall','floor','seat','floor','seat','floor','wall','floor','floor','floor','floor','seat','table','table','wall','floor','floor','seat','floor','seat','floor','seat','floor','seat','floor','floor','wall'],
            ['wall','seat','floor','seat','floor','floor','wall','wall','wall','floor','floor','wall','wall','wall','wall','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','wall'],
            ['wall','floor','seat','floor','seat','floor','wall','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall'],
            ['wall','seat','floor','seat','floor','floor','floor','floor','seat','floor','floor','floor','floor','seat','floor','floor','floor','wall','grass','grass','grass','grass','grass','grass','grass','grass','wall'],
            ['wall','floor','seat','floor','seat','floor','floor','floor','table','table','table','floor','floor','table','table','table','floor','wall','grass','grass','grass','grass','grass','tree','tree','grass','wall'],
            ['wall','seat','floor','seat','floor','floor','wall','floor','table','table','table','floor','floor','table','table','table','floor','wall','grass','grass','grass','grass','tree','tree','tree','tree','wall'],
            ['wall','wall','wall','wall','wall','wall','wall','floor','floor','floor','seat','floor','floor','floor','floor','seat','floor','wall','grass','grass','grass','grass','tree','tree','tree','tree','wall'],
            ['wall','floor','floor','floor','floor','floor','wall','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','wall','grass','grass','grass','grass','grass','tree','tree','grass','wall'],
            ['wall','floor','table','table','seat','floor','wall','floor','seat','floor','floor','floor','floor','seat','floor','floor','floor','floor','grass','grass','grass','grass','grass','grass','grass','grass','wall'],
            ['wall','seat','table','table','floor','floor','wall','floor','table','table','table','floor','floor','table','table','table','floor','floor','grass','grass','grass','grass','grass','grass','grass','grass','wall'],
            ['wall','floor','table','table','seat','floor','floor','floor','table','table','table','floor','floor','table','table','table','floor','wall','grass','grass','grass','grass','grass','grass','grass','grass','wall'],
            ['wall','floor','floor','floor','floor','floor','wall','floor','floor','floor','seat','floor','floor','floor','floor','seat','floor','wall','grass','tree','tree','grass','grass','grass','grass','grass','wall'],
            ['wall','wall','wall','wall','wall','wall','wall','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','wall','tree','tree','tree','tree','grass','grass','grass','grass','wall'],
            ['wall','floor','floor','floor','floor','floor','wall','floor','seat','floor','floor','floor','floor','seat','floor','floor','floor','wall','tree','tree','tree','tree','grass','grass','grass','grass','wall'],
            ['wall','floor','table','table','seat','floor','wall','floor','table','table','table','floor','floor','table','table','table','floor','wall','grass','tree','tree','grass','grass','tree','tree','grass','wall'],
            ['wall','seat','table','table','floor','floor','wall','floor','table','table','table','floor','floor','table','table','table','floor','wall','grass','grass','grass','grass','tree','tree','tree','tree','wall'],
            ['wall','floor','table','table','seat','floor','floor','floor','floor','floor','seat','floor','floor','floor','floor','seat','floor','wall','grass','grass','grass','grass','tree','tree','tree','tree','wall'],
            ['wall','floor','floor','floor','floor','floor','wall','floor','floor','floor','floor','floor','floor','floor','floor','floor','floor','wall','grass','grass','grass','grass','grass','tree','tree','grass','wall'],
            ['wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall','wall'],
        ];
        $tileRooms = [
            [null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,'rest_room','rest_room','rest_room','rest_room','rest_room','rest_room','rest_room',null,'cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria',null],
            [null,'meeting_room','meeting_room',null,null,null,null,'rest_room','rest_room','rest_room','rest_room','rest_room','rest_room','rest_room',null,'cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,'rest_room','rest_room','rest_room','rest_room','rest_room','rest_room','rest_room',null,'cafeteria','cafeteria',null,null,null,null,null,null,null,'cafeteria','cafeteria',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,'rest_room','rest_room','rest_room','rest_room','rest_room',null,null,null,'cafeteria','cafeteria',null,null,null,null,null,null,null,'cafeteria','cafeteria',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,'rest_room','rest_room','rest_room','rest_room','rest_room',null,null,null,'cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,null,null,'open_space','open_space',null,null,null,null,'cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria','cafeteria',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,null,null,null,null,null,null,null,null,null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,'garden','garden','garden','garden','garden','garden','garden','garden',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room','open_space','open_space',null,null,null,'open_space','open_space',null,null,null,'open_space',null,'garden','garden','garden','garden','garden',null,null,'garden',null],
            [null,'meeting_room','meeting_room','meeting_room','meeting_room','meeting_room',null,'open_space',null,null,null,'open_space','open_space',null,null,null,'open_space',null,'garden','garden','garden','garden',null,null,null,null,null],
            [null,null,null,null,null,null,null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,'garden','garden','garden','garden',null,null,null,null,null],
            [null,'office_1','office_1','office_1','office_1','office_1',null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,'garden','garden','garden','garden','garden',null,null,'garden',null],
            [null,'office_1',null,null,'office_1','office_1',null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','garden','garden','garden','garden','garden','garden','garden','garden',null],
            [null,'office_1',null,null,'office_1','office_1',null,'open_space',null,null,null,'open_space','open_space',null,null,null,'open_space','open_space','garden','garden','garden','garden','garden','garden','garden','garden',null],
            [null,'office_1',null,null,'office_1','office_1','open_space','open_space',null,null,null,'open_space','open_space',null,null,null,'open_space',null,'garden','garden','garden','garden','garden','garden','garden','garden',null],
            [null,'office_1','office_1','office_1','office_1','office_1',null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,'garden',null,null,'garden','garden','garden','garden','garden',null],
            [null,null,null,null,null,null,null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,null,null,null,null,'garden','garden','garden','garden',null],
            [null,'office_2','office_2','office_2','office_2','office_2',null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,null,null,null,null,'garden','garden','garden','garden',null],
            [null,'office_2',null,null,'office_2','office_2',null,'open_space',null,null,null,'open_space','open_space',null,null,null,'open_space',null,'garden',null,null,'garden','garden',null,null,'garden',null],
            [null,'office_2',null,null,'office_2','office_2',null,'open_space',null,null,null,'open_space','open_space',null,null,null,'open_space',null,'garden','garden','garden','garden',null,null,null,null,null],
            [null,'office_2',null,null,'office_2','office_2','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,'garden','garden','garden','garden',null,null,null,null,null],
            [null,'office_2','office_2','office_2','office_2','office_2',null,'open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space','open_space',null,'garden','garden','garden','garden','garden',null,null,'garden',null],
            [null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],
        ];

        $ySize = count($tileTypes);
        $xSize = count($tileTypes[0]);
        for ($y= 0; $y<$ySize; $y++) {
            for ($x = 0; $x<$xSize; $x++) {
                $type = $tileTypes[$y][$x];
                $room = $tileRooms[$y][$x];
                /*
                switch ($type) {
                    case 'x': $type = 'wall'; break;
                    case '1':
                    case '2':
                        $room = $type;
                        $type = 'chair';
                        break;
                    case 't': $type = 'table'; break;
                    default: $type = 'floor'; break;
                }*/

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
