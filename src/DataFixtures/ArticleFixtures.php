<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //ajout de 10 article dans ma table artile dans la base de doonée
        for ($i = 1; $i <= 10; $i++) {
            $article = new Article();
            $article->setTitle("Titre de l'artcile n) $i")
            ->setContent("<p> Le contenu de l'article n°$i </p>")
            ->setImage("http://placehold.it/350x150")
            ->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($article); //ajout dans la base de donnée
      }

        $manager->flush(); //mise en place des manip
    }
}
 