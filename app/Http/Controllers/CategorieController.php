<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategorieCreateRequest;
use App\Http\Requests\CategorieUpdateRequest;
use App\Models\Categorie;
use App\Http\Repository\CategorieRepository;

class CategorieController extends Controller
{

        //function create Categorie
        public function create(CategorieCreateRequest $request)
        {
            $name                = $request->input('name');
            $categorie           = CategorieRepository::create($name);
            return response()->json(['status' => 'success', 'message' => 'Categorie created successfully'], 200);

        }

        //function update Categorie
        public function update(CategorieUpdateRequest $request, $id)
             {
                $name                = $request->input('name');
                $categorie           = Categorie::findOrFail($id);
                $categorieRepository = new CategorieRepository($categorie);
                $categorie           = $categorieRepository->update($name,$id);

                  return response()->json(['status' => 'success', 'message' => 'categorie updated successfully'], 200);
             }

        //function delete Categorie
        public function delete($id)

                 {
                     $categorie = Categorie::findOrFail($id);
                     $categorie->delete();
                     if ($categorie) {
                         return response()->json(['success' => true,'message' => 'categorie Successfully Deleted!',], 200);
                     } else {
                         return response()->json(['success' => false,'message' => 'categorie Failed to Delete!',], 500);
                     }

                 }

        //function show Categorie
        public function show($id)
                     {
                         $categorie = Categorie::find($id);
                             if ($categorie) {
                             return response()->json(['success' => true,'message' => 'Detail categorie!','data'    => $categorie], 200);
                             }
                             else {
                             return response()->json(['success' => false,'message' => 'categorie Not Found!','data'    => ''], 404);
                             }
                     }
}
