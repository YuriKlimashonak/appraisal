<?php

namespace App\DataFixtures;

use App\Entity\Appraisal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppraisalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $appraisal = new Appraisal();
        $appraisal->setTitle('Оценка стоимости недвижимости');
        $appraisal->setCost('10000');
        $manager->persist($appraisal);

        $appraisal = new Appraisal();
        $appraisal->setTitle('Оценка стоимости автомобиля');
        $appraisal->setCost('5000');
        $manager->persist($appraisal);

        $appraisal = new Appraisal();
        $appraisal->setTitle('Оценка стоимости земли');
        $appraisal->setCost('8000');
        $manager->persist($appraisal);

        $manager->flush();
    }
}
