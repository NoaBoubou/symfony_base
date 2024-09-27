<?php 

namespace App\DataFixtures;
 
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
 
class ImageFixtures extends Fixture //implements DependentFixtureInterface
{
    public const IMAGE_REFERENCE = 'Image';

    public function load(ObjectManager $manager)
    {
        $nomsImages = [
            'burger.jpg',
            'fries.jpg',
            'drink.jpg',
            'dessert.jpg',
            'salad.jpg',
            'combo.jpg'
        ];
 
        foreach ($nomsImages as $key => $nomImage) {
            $image = new Image();
            //$image->setBurgers( $this->getReference(BurgerFixtures::BURGER_REFERENCE . '_' . $key));
            $image->setSrc($nomImage); // On suppose qu'il y a un attribut pour le nom de l'image
            $manager->persist($image);
            $this->addReference(self::IMAGE_REFERENCE . '_' . $key, $image);
        }
 
        $manager->flush();
    }

    /*public function getDependencies()
    {
        return [
            BurgerFixtures::class, 
        ];
    }*/
}

?>
