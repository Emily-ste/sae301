<?php

namespace App\Controller\Admin;

use App\Entity\Manifestations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ManifestationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manifestations::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
