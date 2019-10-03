<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/10/03
 * Time: 14:23
 */

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {

           // $category = $this->getReference(ArticleCategoryFixture::getReferenceKey($i % 5));
            $article = new Article();
            $article
                ->setTitle('title')
                ->setContent('content');
            $this->setReference('title-test', $article);
            $manager->persist($article);

        $manager->flush();
    }

//    public function getDependencies(){
//        return[
//            ArticleCategoryFixture::class
//        ];
//    }

}