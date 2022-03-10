<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;

class SQLFiles extends Fixture
{
    /**
     * @param ObjectManager $manager
     * symfony console doctrine:fixtures:load
     */
    public function load(ObjectManager $manager)
    {
        $finder = new Finder();
        $finder->in(__DIR__ . '/../../SQL/data');
        $finder->name('*.sql');
        $finder->files();
        $finder->sortByName();

        if ($finder->hasResults()) {
            foreach( $finder as $file ){
                print "Importing: {$file->getBasename()} " . PHP_EOL;

                $sql = $file->getContents();

                $manager->getConnection()->exec($sql);  // Execute native SQL

                $manager->flush();
            }
        }
        else {
            print "No SQL file found !!";
        }

    }
}
