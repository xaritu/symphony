<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ToppageControllerTest extends WebTestCase{
    public function testShowPost()
    {
        $client = static::createClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/top');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(8, $crawler->filter('h2'));
        $this->assertGreaterThan(
            1,
            $crawler->filter('h2')->count()
        );
        $this->assertContains('Test', $client->getResponse()->getContent());
    }
}