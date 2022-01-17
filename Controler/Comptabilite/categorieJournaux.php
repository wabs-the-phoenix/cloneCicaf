<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\CategorieJournaux;

$page = "Categorie journaux";
$category = new CategorieJournaux();
$allCategoriesStd = $category->findAll();

$categories = [];
foreach ($allCategoriesStd as $key => $value) {
    $cat = new CategorieJournaux();
    $cat->hydrated($value);
    $categories[] = $cat;
}

require "View/Comptabilite/categorieJournaux.php";