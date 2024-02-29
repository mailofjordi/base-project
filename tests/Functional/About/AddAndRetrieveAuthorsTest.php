<?php

declare(strict_types=1);

namespace App\Tests\Functional\About;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddAndRetrieveAuthorsTest extends WebTestCase
{
    public function testGivenANonUuid4Id_WhenAddingAnAuthor_ThenAnExceptionIsThrown(): void
    {
        $client = self::createClient(['environment' => 'test']);
        $json_encode = json_encode([
            'id' => '123',
            'name' => 'John Doe',
        ]);

        $client->request(
            'POST',
            '/author',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            $json_encode
        );
        $this->assertEquals(500, $client->getResponse()->getStatusCode());
    }

    public function testGivenAnUuid4Id_WhenAddingAnAuthor_ThenTheAuthorIsAdded(): void
    {
        $client = self::createClient(['environment' => 'test']);
        $client->request(
            'POST',
            '/author',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'id' => '123e4567-e89b-12d3-c456-426655440000',
                'name' => 'Pepito Grillo',
            ])
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request(
            'GET',
            '/'
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('Pepito Grillo', (string) $client->getResponse()->getContent());
    }
}
