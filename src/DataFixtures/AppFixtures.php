<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use App\Entity\Contact;
use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private Generator $faker;

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->faker = Factory::create('fr_FR');
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        //CONCERTS
        $concerts = [];
        for ($i = 0; $i < 10; $i++) {
            $concert = new Concert();
            $concert->setName($this->faker->name())
                ->setBeginDatetime($this->faker->dateTime())
                ->setEndDatetime($this->faker->dateTime())
                ->setContent($this->faker->text())
                ->setImg($this->faker->imageUrl($width = 640, $height = 480))
                ->setLocation(null);

            $concerts[] = $concert;
            $manager->persist($concert);
        }

        //CONTACT
        $contacts = [];
        for ($i = 0; $i < 10; $i++) {
            $contact = new Contact();
            $contact->setName($this->faker->name())
                ->setEmail($this->faker->email())
                ->setSubject($this->faker->text())
                ->setMessage($this->faker->text())
                ->setCreatedAt(new \DateTimeImmutable());

            $contacts[] = $contact;
            $manager->persist($contact);
        }

        //NEWS
        $news = [];
        for ($i = 0; $i < 10; $i++) {
            $new = new News();
            $new->setTitle($this->faker->title())
                ->setSummary($this->faker->text())
                ->setContent($this->faker->text())
                ->setImg($this->faker->imageUrl($width = 640, $height = 480));
                

            $news[] = $new;
            $manager->persist($new);
        }
        
        $manager->flush();
    }
}
