<?php

/*/* 

namespace App\DataFixtures;

use App\Entity\Burger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BurgerFixtures extends Fixture implements DependentFixtureInterface
{
    public const BURGER_REFERENCE = 'Burger';
    
    public function load(ObjectManager $manager)
    {
        $nomsBurgers = [
            'Cheeseburger',
            'Double Cheese',
            'Chicken Burger',
            'Vegan Burger',
            'Bacon Burger',
            'Fish Burger'
        ];

        foreach ($nomsBurgers as $key => $nomBurger) {
            // On récupère une référence à un pain, ici on prend le premier pain
            $pain = $this->getReference(PainFixtures::PAIN_REFERENCE . '_' . 0);
            $image = $this->getReference(ImageFixtures::IMAGE_REFERENCE . '_' . $key); // Index 0 pour le premier pain
            //$oignon = $this->getReference(OignonFixtures::OIGNON_REFERENCE . '_' . $key); // Index 0 pour le premier pain

            $burger = new Burger();
            $burger->setName($nomBurger);
            $burger->setPrice(10); // Définir un prix pour le burger
            $burger->setPain($pain); // Associer le burger au pain
            $burger->setImage($image);
            $manager->persist($burger);
            $this->addReference(self::BURGER_REFERENCE . '_' . $key, $burger); // Ajout de référence pour le burger
        }

        $manager->flush(); // Sauvegarder toutes les entités persistées
    }

    // Retourner la classe de la fixture de dépendance
    public function getDependencies()
    {
        return [
            PainFixtures::class, 
            OignonFixtures::class, 
            ImageFixtures::class// Retourne la classe et non une constante
        ];
    }
}
*/

namespace App\DataFixtures;

use App\Entity\Burger;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BurgerFixtures extends Fixture implements DependentFixtureInterface
{
    public const BURGER_REFERENCE = 'Burger';

    public function load(ObjectManager $manager): void
    {
        $nomsBurgers = [
            'classique',
            'chily',
            'smash'
        ];
 
        foreach ($nomsBurgers as $key => $nomBurger) {
            $pain = $this->getReference(PainFixtures::PAIN_REFERENCE.'_'. $key);
            $image = $this->getReference(ImageFixtures::IMAGE_REFERENCE.'_'. $key);

            $burger = new Burger();
            $burger->setName($nomBurger);
            $burger->setPrice(10);

            $burger->setPain($pain);
            $burger->setImage($image);

            $manager->persist($burger);
    
            $this->addReference(self::BURGER_REFERENCE . '_' . $key, $burger);
        }

        $manager->flush();
    }

    // Spécifie que cette fixture dépend de `PainFixtures`
    public function getDependencies()
    {
        return [
            PainFixtures::class,
        ];
    }
// Suggested code may be subject to a license. Learn more: ~LicenseLog:3289666366.
// Suggested code may be subject to a license. Learn more: ~LicenseLog:1574370921.
}

?>