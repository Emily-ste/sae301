<?php

namespace App\Controller\Admin;

use App\Entity\Manifestations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
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
            TextField::new('manif_description')->onlyOnForms(),
            TextField::new('manif_casting')->onlyOnForms(),
            TextField::new('manif_genre'),
            IntegerField::new('manif_prix'),
            ImageField::new('manif_affiche')
                ->setBasePath('img/affiches')
                ->setUploadDir('public/img/affiches')
                ->setUploadedFileNamePattern('img/affiches/[year]-[month]-[day]-[slug].[extension]')
                ->onlyOnForms(),
            TextField::new('manif_date')->onlyOnForms(),
            TextField::new('manif_horaire')->onlyOnForms(),
            AssociationField::new('salles', 'Salle')
        ];
    }

}
