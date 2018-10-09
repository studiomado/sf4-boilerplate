<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testIsValidWithinValidCredentials()
    {
        $response = $this->client->request(
            'POST',
            'http://localhost:8000/api/login_check', [
                'username' => 'sensorario@example.com',
                'password' => 'password',
            ]
        );

        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode()
        );
    }

    public function testFailsWheneverCredentialsArNotValid()
    {
        $response = $this->client->request(
            'POST',
            'http://localhost:8000/api/login_check', [
                'username' => 'sensorario@example.com',
                'password' => 'passwoddrd',
            ]
        );

        $this->assertEquals(
            403,
            $this->client->getResponse()->getStatusCode()
        );
    }

    public function testFailsWheneverCredentialsAreNotCoplete()
    {
        $response = $this->client->request(
            'POST',
            'http://localhost:8000/api/login_check', [
                'username' => 'sensorario@example.com',
                'password' => 'passwoddrd',
                'pafasdssword' => 'passwoddrd',
            ]
        );

        $this->assertEquals(
            403,
            $this->client->getResponse()->getStatusCode()
        );
    }

    public function testFailsWithinWrongUser()
    {
        $response = $this->client->request(
            'POST',
            'http://localhost:8000/api/login_check', [
                'username' => 'sensorarasdasdaio@example.com',
                'password' => 'password',
            ]
        );

        $this->assertEquals(
            403,
            $this->client->getResponse()->getStatusCode()
        );
    }
}
