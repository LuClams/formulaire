<?php

namespace App\Controller\Admin;

use App\Entity\Hostel;
use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use mysql_xdevapi\CollectionAdd;
use phpDocumentor\Reflection\Types\Collection;
use function PHPUnit\Framework\isTrue;

class RoomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
            ImageField::new('image')
                ->setBasePath('images/room')
                ->setUploadDir('public/images/room')
                ->setUploadedFileNamePattern('[randomhash], [extension]')
                ->setRequired(false),
            AssociationField::new('hostelRoom'),
            AssociationField::new('manager'),
            IntegerField::new('price'),
        ];
    }

}
