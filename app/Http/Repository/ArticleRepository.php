<?php

namespace App\Http\Repository;
use App\Models\Article;

Class ArticleRepository
{
        /**
         * @var Article
         */
        private $article;

        /**
         * ArticleRepository constructor.
         *
         * @param Article $article
         */
        public function __construct(Article $article)
        {
            $this->article = $article;
        }

        public static function create($name, $price, $old_price, $description, $brand, $weight, $size, $color, $availability, $ref, $categorie_id)
        {
            $article = new Article();
            $article->name        = $name;
            $article->price       = $price;
            $article->old_price   = $old_price;
            $article->description = $description;
            $article->brand       = $brand;
            $article->weight      = $weight;
            $article->size        = $size;
            $article->color       = $color;
            $article->availability= $availability;
            $article->categorie_id= $categorie_id;
            $article->save();
            return $article;
        }

        public function update($name, $price, $old_price, $description, $brand, $weight, $size, $color, $availability, $ref, $categorie_id)
        {

            $this->article->name        = $name;
            $this->article->price       = $price;
            $this->article->old_price   = $old_price;
            $this->article->description = $description;
            $this->article->brand       = $brand;
            $this->article->weight      = $weight;
            $this->article->size        = $size;
            $this->article->color       = $color;
            $this->article->availability= $availability;
            $this->article->categorie_id= $categorie_id;

            return $this->article->save();


        }

    }
