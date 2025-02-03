<?php

namespace App\Controller\Admin;

use App\Entity\Performance;
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

class PerformanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Performance::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Performances')
            ->setEntityLabelInSingular('Performance')
            ->setPageTitle("index","Nation-Sounds - Administration des performances")
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm(),
            TextField::new('name',"Nom de la performance"),
            AssociationField::new('location', "Lieu")
            ->autocomplete(), 
            DateTimeField::new('begin_datetime',"Début de la performance"),
            DateTimeField::new('end_datetime', "Fin de la performance"),   
            TextareaField::new('content', "Description")
                ->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('imageName',"Image")->setBasePath('/images/ns_img_content')->setUploadDir('/public/images/ns_img_content')
                ->onlyOnIndex(),
        ];
    }
}
