<?php

namespace App\Http\Repository;
use App\Models\Article;
use App\Models\Image_Article;
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

        public static function create($name, $price, $old_price, $description, $brand, $weight, $size, $color, $availablity, $ref, $image, $categorie_id)
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
            $article->availablity = $availablity;
            $article->ref         = $ref;
            $article->image       = $image;
            //////////////code d'upload multiple image/////////////
            /*if(is_array($image_articles)) {
                foreach($image_articles as $image){
                    $imageArticle = new Image_Article();
                    $imageArticle->img         = $image;
                    $imageArticle->article_id  = $article->id;
                    $article->image_articles()->save($imageArticle);
                }
            }*/
            $article->categorie_id= $categorie_id;
            $article->save();
            return $article;
        }

        public function update($name, $price, $old_price, $description, $brand, $weight, $size, $color, $availablity, $ref, $categorie_id)
        {

            $this->article->name        = $name;
            $this->article->price       = $price;
            $this->article->old_price   = $old_price;
            $this->article->description = $description;
            $this->article->brand       = $brand;
            $this->article->weight      = $weight;
            $this->article->size        = $size;
            $this->article->color       = $color;
            $this->article->availablity = $availablity;
            $this->article->categorie_id= $categorie_id;

            return $this->article->save();


        }

    }
