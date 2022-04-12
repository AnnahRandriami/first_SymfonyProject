<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create('fr_FR');

        //créer trois category fake
        for ($i = 0; $i <= 3; $i++) {
            $category = new Category();
            $category->setTitle($faker->sentence())
                ->setDescription($faker->paragraph());

            $manager->persist($category);

          
            for ($j = 1; $j <= mt_rand(4, 6); $j++) {
                $article = new Article();
                $content = '<p>' . join($faker->paragraphs(5) , '</p><p>') . '</p>';
                $article->setTitle($faker->sentence())
                    ->setContent($content)
                    ->setImage($faker->imageUrl())
                    ->setCreatedAt(new \DateTimeImmutable())
                    ->setCategory($category);

                $manager->persist($article); //ajout dans la base de donnée

                for ($k = 1; $k <= mt_rand(4, 6); $k++) {
                    $comment = new Comment();
                    $content = '<p>' . join($faker->paragraphs(2) , '</p><p>') . '</p>';
                    $comment->setAuthor($faker->name)
                        ->setContent($content)
                        ->setCreatedAt(new \DateTimeImmutable())
                        ->setArticle($article);

                    $manager->persist($comment);
                }
            }
        }



        $manager->flush();
    }
}
