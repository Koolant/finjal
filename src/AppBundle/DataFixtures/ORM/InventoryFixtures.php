<?php

namespace AppBundle\DataFixtures\ORM;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use AppBundle\Entity\Item;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class InventoryFixtures implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $serializer = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);

        $dir = array(__DIR__);
        $locator = new FileLocator($dir);
        $path = $locator->locate('formatteditems.csv', null, true);
        $data = $serializer->decode(file_get_contents($path),'csv');

        foreach ($data as $row) {
            $item = new Item();
            $item->setName($row['name']);
            $item->setPhase($row['phase']);
            $manager->persist($item);
        }
        $manager->flush();
    }
}