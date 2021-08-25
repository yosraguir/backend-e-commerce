<?php

namespace App\Http\Repository;
use App\Models\Sous_Categorie;

Class SousCategorieRepository
{
        /**
         * @var Sous_Categorie
         */
        private $sous_Categorie;

        /**
         * SousCategorieRepository constructor.
         *
         * @param Sous_Categorie $sous_Categorie
         */
        public function __construct(Sous_Categorie $sous_Categorie)
        {
            $this->sous_Categorie = $sous_Categorie;
        }

        public static function create($name,$categorie_id)
        {
            $sous_Categorie = new Sous_Categorie();
            $sous_Categorie->name               = $name;
            $sous_Categorie->categorie_id       = $categorie_id;
            $sous_Categorie->save();
            return $sous_Categorie;
        }

        public function update($name, $categorie_id)
                {

                    $this->sous_Categorie->name        = $name;
                    $this->sous_Categorie->categorie_id= $categorie_id;

                    return $this->sous_Categorie->save();


                }



    }
