<?php

namespace App\Controller\Admin;

use App\Entity\Workshop;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_EDITOR')]
class WorkshopCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workshop::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Ateliers')
            ->setEntityLabelInSingular('Atelier')
            ->setPageTitle("index","Nation-Sounds - Administration des ateliers")
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {   
        return [

            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm(),
            TextField::new('name',"Nom de l'atelier"),
            AssociationField::new('location',"Lieu")
            ->autocomplete(),
            DateTimeField::new('begin_datetime',"Début de l'atelier"),
            DateTimeField::new('end_datetime',"Fin de l'atelier"),   
            TextareaField::new('content')
                ->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('imageName',"Image")->setBasePath('/images/ns_img_content')->setUploadDir('/public/images/ns_img_content')
                ->onlyOnIndex(),
        ];
    }
}
