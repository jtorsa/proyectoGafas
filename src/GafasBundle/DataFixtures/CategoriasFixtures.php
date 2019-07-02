<?php
namespace GafasBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use GafasBundle\Entity\Categoria;
use Faker\Factory;
class CategoriasFixtures extends Fixture

{
    public function load( ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i=0;$i<5;$i++){
        $categoria = new Categoria();
        $categoria->setName($faker->unique()->word);

        
        $manager->persist($categoria);
        $manager->flush();
        }
    }
}