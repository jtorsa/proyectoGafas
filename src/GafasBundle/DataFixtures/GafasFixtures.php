<?php
namespace GafasBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use GafasBundle\Entity\Gafas;
use Faker\Factory;
class GafasFixtures extends Fixture

{
    public function load( ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i=0;$i<10;$i++){
        $gafa = new Gafas();
        $gafa->setModel($faker->unique()->word);
        $gafa->setCategory($faker->word());
        $gafa->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 30));
        $gafa->setImage("gafa".$i.".jpg");

        
        $manager->persist($gafa);
        $manager->flush();
        }
    }
}