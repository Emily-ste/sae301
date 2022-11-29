<?php

namespace App\Controller\Admin;

use App\Entity\Salles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SallesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salles::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('salle_nom'),
            IntegerField::new('salle_capacite'),
            TextField::new('salle_adresse'),
        ];
    }

}
