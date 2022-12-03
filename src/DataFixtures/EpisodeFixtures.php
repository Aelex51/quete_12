<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class EpisodeFixtures extends Fixture
{
    public const NBOFEPISODES = 10;

    public function load(ObjectManager $manager): void
    {
         $faker = Factory::create();

        for($index = 0; $index < SeasonFixtures::$numSeason; $index++) {

            for($i = 0; $i < self::NBOFEPISODES; $i++) {
                $episode = new Episode();
            
                $episode->setNumber($i+1);
                $episode->setTitle($faker->word());
                $episode->setSynopsis($faker->paragraphs(3, true));

                $episode->setSeason($this->getReference('season_' . $index));

                $manager->persist($episode);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}
