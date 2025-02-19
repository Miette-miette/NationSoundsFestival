<?php

namespace App\Tests\Unit;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    public function getEntity(): User
    {
        return (new User())
            ->setFirstName('Alain')
            ->setLastName('Fini')
            ->setEmail('alainfini@mail.com')
            ->setRoles(['ROLE_USER'])
            ->setPlainPassword('password')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
    }

    public function testEntityisValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $user = $this->getEntity();

        $errors = $container->get('validator')->validate($user);

        $this->assertCount(0, $errors);
    }

    public function testInvalidName()
    {
        self::bootKernel();
        $container = static::getContainer();

        $user = $this->getEntity();
        $user->setFirstName('');

        $errors = $container->get('validator')->validate($user);

        $this->assertCount(2, $errors);
    }
}
