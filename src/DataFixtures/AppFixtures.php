<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $connection = $manager->getConnection();

        $encoded = $this->encoder->encodePassword(
            $user = new \App\Entity\User(),
            $plainPassword = 'password'
        );

        $connection->insert('user', [
            'email' => 'sensorario@example.com',
            'roles' => json_encode(['ROLE_USER']),
            'password' => $encoded,
        ]);

        $manager->flush();
    }
}
