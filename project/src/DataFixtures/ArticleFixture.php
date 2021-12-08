<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        for( $i = 0 ; $i<20; $i++){
            $article = new Article();
            $article->setTitle($faker->text(20));
            $article->setContent($faker->text(10000));
            $article->setCreateAt(\DateTimeImmutable::createFromMutable($faker->dateTime('now')));
            $manager->persist($article);
        }


        $manager->flush();

        $manager->flush();
    }
}
