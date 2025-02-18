<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_EDITOR')]
class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Evènements')
            ->setEntityLabelInSingular('Evènement')
            ->setPageTitle("index","Nation-Sounds - Administration des évènements")
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm(),
            TextField::new('name', "Nom de l'artiste/groupe"),
            ChoiceField::new('type', "Type d'évènement")->setChoices([
                'Concert' => 'concert',
                'Performance' => 'performance',
                'Atelier' => 'workshop'
            ]),
            AssociationField::new('location', "Scène"),
            DateTimeField::new('begin_datetime',"Début de l'évènement"),
            DateTimeField::new('end_datetime',"Fin de l'évènement"),
            TextareaField::new('content',"Description")
                ->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('imageName', "Image")->setBasePath('/images/ns_img_content')->setUploadDir('/public/images/ns_img_content')
                ->onlyOnIndex(),
        ];
    }
}
