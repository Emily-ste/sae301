<?php

namespace App\Controller\Admin;

use App\Entity\Manifestations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ManifestationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manifestations::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('manif_titre'),
            TextEditorField::new('manif_description')->onlyOnForms(),
            TextEditorField::new('manif_casting')->onlyOnForms(),
            TextField::new('manif_genre'),
            IntegerField::new('manif_prix'),
            TextField::new('manif_affiche')->onlyOnForms(),
            TextField::new('manif_date')->onlyOnForms(),
            TextField::new('manif_horaire')->onlyOnForms(),
            AssociationField::new('salles', 'Salle')
        ];
    }

}
