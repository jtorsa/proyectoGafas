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

        for($i=0;$i<7;$i++){
        $gafa = new Gafas();
        $gafa->setModel($faker->unique()->word);
        $gafa->setCategoria($faker->numberBetween($min = 1, $max = 5));
        $gafa->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 30));
        $gafa->setImage("gafa".$i.".jpg");

        
        $manager->persist($gafa);
        $manager->flush();
        }
    }
}