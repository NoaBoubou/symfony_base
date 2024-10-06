<?php 

namespace App\DataFixtures;
 
use App\Entity\Pain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class PainFixtures extends Fixture
{
    public const PAIN_REFERENCE = 'Pain';
    
    public function load(ObjectManager $manager)
    {
        $nomsPains = [
            'Baguette',
            'Complet',
            'Seigle',
            'Mais',
            "Pain de mie"
        ];
 
        foreach ($nomsPains as $key => $nomPain) {
            $pain = new Pain();
            $pain->setName($nomPain);
            $manager->persist($pain);
            $this->addReference(self::PAIN_REFERENCE . '_' . $key, $pain);
        }
 
        $manager->flush();
    }
}

?>
