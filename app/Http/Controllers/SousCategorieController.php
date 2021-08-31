<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SousCategorieCreateRequest;
use App\Http\Requests\SousCategorieUpdateRequest;
use App\Models\Sous_Categorie;
use App\Http\Repository\SousCategorieRepository;


class SousCategorieController extends Controller
{
    //function create sous_categorie
    public function create(SousCategorieCreateRequest $request)
            {
                $name                = $request->input('name');
                $categorie_id        = $request->input('categorie_id');
                $SousCategorie       = SousCategorieRepository::create($name, $categorie_id);
                return response()->json(['status' => 'success', 'message' => 'SousCategorie created successfully'], 200);

            }

    //function update sous_categorie
    public function update(SousCategorieUpdateRequest $request, $id)
             {
                $name                    = $request->input('name');
                $categorie_id            = $request->input('categorie_id');

                $sousCategorie           = Sous_Categorie::findOrFail($id);
                $sousCategorieRepository = new SousCategorieRepository($sousCategorie);
                $sousCategorie           = $sousCategorieRepository->update($name, $categorie_id, $id);

                  return response()->json(['status' => 'success', 'message' => 'Sous_Categorie updated successfully'], 200);
             }

    //function delete sous_categorie
    public function delete($id)

                     {
                         $sousCategorie = Sous_Categorie::findOrFail($id);
                         $sousCategorie->delete();
                         if ($sousCategorie) {
                             return response()->json(['success' => true,'message' => 'sousCategorie Successfully Deleted!',], 200);
                         } else {
                             return response()->json(['success' => false,'message' => 'sousCategorie Failed to Delete!',], 500);
                         }

                     }

    //function show sous_categorie
    public function show($id)
                     {
                          $sousCategorie = Sous_Categorie::find($id);
                                 if ($sousCategorie) {
                                 return response()->json(['success' => true,'message' => 'Detail sousCategorie!','data'    => $sousCategorie], 200);
                                 }
                                 else {
                                 return response()->json(['success' => false,'message' => 'sousCategorie Not Found!','data'    => ''], 404);
                                 }
                         }
}
