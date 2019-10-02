<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use FOS\UserBundle\Doctrine\UserManager;
//use Liip\TestFixturesBundle\Test\FixturesTrait;

class ArticleControllerTest extends WebTestCase{
    public function testsuccess(){
        $client = static::createClient();
        //$client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        $crawler->attr('class');
       $buttonCrawlerNode = $crawler->selectButton('Log in');
//        $form = $buttonCrawlerNode->form();

        $form = $buttonCrawlerNode->form([
            '_username'    => 'pari',
            '_password' => '1421',
        ]);
        $client->submit($form);

      //  $this->assertEquals(302, $client->getResponse()->getStatusCode());
       $this->assertTrue($client->getResponse()->isRedirect());
//        $this->assertEquals('/login', $client->getRequest()->getPathInfo());


 //      $this->assertTrue($client->getResponse()->isSuccessful());
//        $this->assertEquals('/client/login', $client->getRequest()->getPathInfo());
    }

    /**
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request(
           'GET', $url );

        $this->assertTrue($client->getResponse()->isRedirect());
    }

    public function provideUrls()
    {
        return [

            ['/article/list']

        ];
    }
}