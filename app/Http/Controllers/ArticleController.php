<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Repository\ArticleRepository;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{

    public function add(Request $request)
   {

        $validator=Validator::make($request->all(),[
        'name'=>'required',
        'price'=>'required',
        'description'=>'required',
        'brand'=>'required',
        //'image'=>'required|image',

        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],409);
        }
        $article = new Article();
        $article->name=$request->name;
        $article->price=$request->price;
        $article->old_price=$request->old_price;
        $article->description=$request->description;
        $article->brand=$request->brand;
        $article->weight=$request->weight;
        $article->size=$request->size;
        $article->color=$request->color;
        $article->availablity=$request->availablity;
        $article->ref=$request->ref;
        $article->image=$request->image;
        $article->categorie_id=$request->categorie_id;
        $article->save();

        //storage image
        /*$url = "http://localhost:8000/storage/";
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('proimages/', $article->id.'.'.$extension);
        $article->image=$path;
        $article->imgpath=$url.$path;
        $article->save();*/
    }
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
            $categorie_id= $request->input('categorie_id');

            $article = Article::findOrFail($id);
            $articleRepository = new ArticleRepository($article);
            $article = $articleRepository->update($name, $price, $old_price, $description, $brand, $weight, $size, $color, $availability, $ref, $categorie_id, $id);

              return response()->json(['status' => 'success', 'message' => 'article updated successfully'], 200);
         }

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

            /*$validator=Validator::make($request->all(),[
            'id'=>'required',

            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->all()],409);
            }
            $article=article::find($request->id->delete);

            return response()->json(['message'=>"Article Successfully deleted"]);*/



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
            /*session(['keys'=>$request->keys]);
            $article=article::where(function($q){
                $q->where('articles.id','LIKE','%', session('keys').'%')
                  ->orwhere('articles.name','LIKE','%'.session('keys').'%')
                  ->orwhere('articles.price','LIKE','%'.session('keys').'%')
                  ->orwhere('articles.description','LIKE','%'.session('keys').'%')
                  ->orwhere('articles.brand','LIKE','%'.session('keys').'%');

            })->select('articles.*')->get();
            return response()->json(['articles'=>$articles]);
            }
            */


}
