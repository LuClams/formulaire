<?php

namespace App\Controller\Admin;

use App\Entity\Hostel;
use ContainerJLxkObg\getUniqidNamer_RoomService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Mime\Address;

class HostelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hostel::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('name'),
            TextField::new('city'),
            TextField::new('address'),
            TextEditorField::new('description'),
            AssociationField::new('rooms'),
            AssociationField::new('manager')
        ];
    }

}
