<?php

namespace App\Controller\Admin;

use App\Entity\Coleccion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Form\ProcessingSpecificationsTestsType;
use App\Form\DurabilitySpecificationsType;
use App\Form\CleaningSpecificationsTestType;
use App\Form\CleaningInstructionsType;
use App\Form\CleaningInstrImagesType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ColeccionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coleccion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Nombre'),
            TextField::new('Aplications'),
            TextField::new('ProductGroup', 'Finishing/Backing'),
            TextField::new('Composition'),
            TextField::new('StaticCode','Static Code'),
            TextField::new('DyeingMethod', 'Dyeing Method'),
            TextField::new('AvailableColours','Available Colours'),
            IntegerField::new('Width'),
            IntegerField::new('Length'),
            IntegerField::new('GSM'),
            ImageField::new('image')
                ->setBasePath('images/coleccion')
                ->setUploadDir('public/images/coleccion')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            CollectionField::new('CleaningSpecifications')
                ->setEntryType(CleaningSpecificationsTestType::class)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
            CollectionField::new('DurabilitySpecifications')
                ->setEntryType(DurabilitySpecificationsType::class)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
            CollectionField::new('ProcessingSpecifications')
                ->setEntryType(ProcessingSpecificationsTestsType::class)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
            CollectionField::new('CleaningInstructions')
                ->setEntryType(CleaningInstructionsType::class)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
            CollectionField::new('CleaningImages')
                ->setEntryType(CleaningInstrImagesType::class)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
        ];
    }
}
