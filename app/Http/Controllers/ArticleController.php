<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //
     public function index()
        {
            return view('FrontEnd.home');
        }
    public function add(Request $request)
    {
        $validator=Validator::make($request->all(),[
        'name'=>'required',
        'price'=>'required',
        'description'=>'required',
        'brand'=>'required',
        'image'=>'required|image',

        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],409);
        }
        $article = new Article();
        $article->name=$request->name;
        $article->price=$request->price;
        $article->description=$request->description;
        $article->brand=$request->brand;
        $article->image=$request->image;
        $article->save();

        //storage image
        $url="http://localhost:8000/storage/";
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('proimages/', $article->id.'.'.$extension);
        $article->image=$path;
        $article->imgpath=$url.$path;
        $article->save();
    }
      public function update(Request $request)
                    {
                        $validator=Validator::make($request->all(),[
                        'id'=>'required',
                        'name'=>'required',
                        'price'=>'required',
                        'description'=>'required',
                        'brand'=>'required',

                        ]);
                        if($validator->fails())
                        {
                            return response()->json(['error'=>$validator->errors()->all()],409);
                        }
                        $article=article::find($request->id);
                        $article->name=$request->name;
                        $article->price=$request->price;
                        $article->description=$request->description;
                        $article->brand=$request->brand;
                        $article->image=$request->image;
                        $article->save();
                        return response()->json(['message'=>"Article Successfully updated"]);

                    }

    public function delete(Request $request)
        {
            $validator=Validator::make($request->all(),[
            'id'=>'required',

            ]);
            if($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()->all()],409);
            }
            $article=article::find($request->id->delete);

            return response()->json(['message'=>"Article Successfully deleted"]);

        }

        public function show( Request $request)
        {
            session(['keys'=>$request->keys]);
            $article=article::where(function($q){
                $q->where('articles.id','LIKE','%', session('keys').'%')
                  ->orwhere('articles.name','LIKE','%'.session('keys').'%')
                  ->orwhere('articles.price','LIKE','%'.session('keys').'%')
                  ->orwhere('articles.description','LIKE','%'.session('keys').'%')
                  ->orwhere('articles.brand','LIKE','%'.session('keys').'%');

            })->select('articles.*')->get();
            return response()->json(['articles'=>$articles]);
        }

}
