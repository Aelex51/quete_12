<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;


class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public const NBOFSEASONS = 5;
    public static int $numSeason = 0;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        /**
         * L'objet $faker que tu récupère est l'outil qui va te permettre 
         * de te générer toutes les données que tu souhaites
         */
           // for($index = 0; $index < count(ProgramFixtures::PROGRAMLIST); $index++) {

        //     for($i = 0; $i < self::NBOFSEASONS; $i++) {
        //         $season = new Season();
            
        //         $season->setNumber($i+1);
        //         $season->setYear($faker->year());
        //         $season->setDescription($faker->paragraphs(3, true));

        //         $season->setProgram($this->getReference('program_' . $index));
        //         $this->addReference('season_' . self::$numSeason, $season);
        //         $manager->persist($season);
        //         self::$numSeason++;
        //     }
        // }
        // $manager->flush();

        }
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          ProgramFixtures::class,
        ];
    }
}
