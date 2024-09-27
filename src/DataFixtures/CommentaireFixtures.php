<?php 

namespace App\DataFixtures;
 
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class CommentaireFixtures extends Fixture
{
    public const COMMENTAIRE_REFERENCE = 'Commentaire';
    
    public function load(ObjectManager $manager)
    {
        $manager->flush();
    }
}

?>
