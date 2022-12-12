<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('status'),
            TextField::new('fullName'),
            TextField::new('companyName'),
            TextField::new('address'),
            TextField::new('city'),
            TextField::new('address'),
            TextField::new('city'),
            TextField::new('region'),
            TextField::new('mobile'),
            TextField::new('email'),
            TextField::new('pesel'),
            TextField::new('nip'),
        ];
    }
}
