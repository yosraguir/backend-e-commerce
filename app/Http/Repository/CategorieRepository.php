<?php

namespace App\Http\Repository;
use App\Models\Categorie;

Class CategorieRepository
{
        /**
         * @var Categorie
         */
        private $categorie;

        /**
         * CategorieRepository constructor.
         *
         * @param Categorie $categorie
         */
        public function __construct(Categorie $categorie)
        {
            $this->categorie = $categorie;
        }

        public static function create($name)
        {
            $categorie        = new Categorie();
            $categorie->name  = $name;
            $categorie->save();
            return $categorie;
        }
        public function update($name)
         {


         $this->categorie->name        = $name;

         return $this->categorie->save();

         }





    }
