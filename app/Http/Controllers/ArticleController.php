<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Repository\ArticleRepository;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Requests\ArticleCreateRequest;
use function App\Http\Helpers\uploadFile;

class ArticleController extends Controller
{

    public function index()
    {
        return view('FrontEnd.home');
    }

    ///////////function add article///////////
      public function add(ArticleCreateRequest $request)
   {

       $name        = $request->input('name');
       $price       = $request->input('price');
       $old_price   = $request->input('old_price');
       $description = $request->input('description');
       $brand       = $request->input('brand');
       $weight      = $request->input('weight');
       $size        = $request->input('size');
       $color       = $request->input('color');
       $availablity = $request->input('availablity');
       $ref         = $request->input('ref');
       $imageFile   = $request->file('image');
       $image       = uploadFile($imageFile);
       $categorie_id= $request->input('categorie_id');

       /*$imagesFile  = $request->file('image_articles');
       foreach($request->image_articles as $image){
           $image_articles = uploadFile($imagesFile);
       }*/

       $article    = ArticleRepository::create($name, $price, $old_price, $description, $brand, $weight,
           $size, $color, $availablity, $ref, $image, $categorie_id);
       return response()->json(['status' => 'success', 'message' => 'article created successfully'], 200);


    }

    ////////function update article//////////
      public function update(ArticleUpdateRequest $request, $id)
         {
            $name        = $request->input('name');
            $price       = $request->input('price');
            $old_price   = $request->input('old_price');
            $description = $request->input('description');
            $brand       = $request->input('brand');
            $weight      = $request->input('weight');
            $size        = $request->input('size');
            $color       = $request->input('color');
            $availablity = $request->input('availablity');
            $ref         = $request->input('ref');
            $imageFile   = $request->file('image');
            $image       = uploadFile($imageFile);
            $categorie_id= $request->input('categorie_id');

            $article = Article::findOrFail($id);
            $articleRepository = new ArticleRepository($article);
            $article = $articleRepository->update($name, $price, $old_price, $description, $brand, $weight, $size, $color, $availablity, $ref, $image, $categorie_id, $id);

              return response()->json(['status' => 'success', 'message' => 'article updated successfully'], 200);
         }

    ////////////function delete article/////////////
      public function delete($id)

             {
                 $article = Article::findOrFail($id);
                 $article->delete();
                 if ($article) {
                     return response()->json(['success' => true,'message' => 'article Successfully Deleted!',], 200);
                 } else {
                     return response()->json(['success' => false,'message' => 'article Failed to Delete!',], 500);
                 }

             }

    //////////function show article////////////
      public function show($id)
    {
        $article = Article::find($id);
        if ($article) {
            return response()->json(['success' => true,'message' => 'Detail article!','data'    => $article], 200);
        }
        else {
            return response()->json(['success' => false,'message' => 'article Not Found!','data'    => ''], 404);
        }
    }



    //////////function search with name /////////
    function search($name)
    {
          return Article::where("name","like","%".$name."%")->get();
    }


}
