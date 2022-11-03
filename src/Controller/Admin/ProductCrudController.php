<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('reference'),
            TextField::new('nom'),
            TextField::new('type'),
            MoneyField::new('prix')
                ->setCurrency('EUR')
                ->setStoredAsCents(false),
            BooleanField::new('waterplouf'),
            AssociationField::new('marque')->autocomplete(),
            ImageField::new('image')
                ->setBasePath('uploads/images/')
                ->setUploadDir('public/uploads/images/'),
            TextEditorField::new('description')
                ->setNumOfRows(15)
                ->setTrixEditorConfig([
                    'blockAttributes'=>[
                        'default'   =>['tagName'=>'p'],
                        'heading1'  =>['tagName'=>'h2'],
                    ],
                    'css'=>[
                        'attachment'=>'admin_file_field_attachment',
                    ]
                ])

        ];
    }
    
}
