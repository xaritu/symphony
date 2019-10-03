<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/10/03
 * Time: 16:47
 */

namespace App\Tests\Articles;


use App\Entity\Article;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Client AS EntityClient;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class ArticleTest extends WebTestCase
{
    use FixturesTrait;

    public function setUp()
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        if (!isset($metadatas)) {
            $metadatas = $em->getMetadataFactory()->getAllMetadata();
        }
        $schemaTool = new SchemaTool($em);
        $schemaTool->dropDatabase();
        if (!empty($metadatas)) {
            $schemaTool->createSchema($metadatas);
        }
        $this->postFixtureSetup();

        $fixtures = array(
        );
        $this->loadFixtures($fixtures);
        $this->fixtures = $this->loadFixtures([
        ])->getReferenceRepository();

    }
    public function testPage()
    {
        $client = static::createClient();

//        $client->followRedirects(true);

//        $client = $this->entityManager
//            ->getRepository(Article::class)
//            ->findOneBy(['Title' => 'title']);


//        $this->assertSame(2, $id-> $id );

//        $id = $this->fixtures['list'];
//        $client->request('GET', 'article/{$id->getId()}');
        $Id = $this->fixtures->getReference('title-test')->getId();
        $crawler = $client->request('GET', "/profiles/$Id");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}