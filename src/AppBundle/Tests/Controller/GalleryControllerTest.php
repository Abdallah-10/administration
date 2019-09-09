<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GalleryControllerTest extends WebTestCase
{
    public function testUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/upload');
    }

}
