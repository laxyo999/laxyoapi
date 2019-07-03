<?php

namespace App\Http\Controllers;
use App\page_categories;
use Illuminate\Http\Request;

class PageCategoriesController extends Controller
{
    public function index()
    {
        $pagecat = auth()->user()->page_categories;
 
        return response()->json([
            'success' => true,
            'data' => $pagecat
        ]);
    }





     public function show($id)
    {
        $pagecat = auth()->user()->page_categories()->find($id);
 
        if (!$pagecat) {
            return response()->json([
                'success' => false,
                'message' => 'page categories with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $pagecat->toArray()
        ], 400);
    }




        public function store(Request $request)
    {
        $this->validate($request, [
            'parent' => 'required|integer',
            'title' => 'required'
        ]);
 
        $pagecat = new page_categories();
        $pagecat->parent = $request->parent;
        $pagecat->title = $request->title;
 
        if (auth()->user()->page_categories()->save($pagecat))
            return response()->json([
                'success' => true,
                'data' => $pagecat->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'page categories could not be added'
            ], 500);
    }



    public function update(Request $request, $id)
    {
        $pagecat = auth()->user()->page_categories()->find(1);

 
        if (!$pagecat) {
            return response()->json([
                'success' => false,
                'message' => 'pagecat with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $pagecat->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'pagecat could not be updated'
            ], 500);
    }


      public function destroy($id)
    {
        $product = auth()->user()->page_categories()->find($id);
 
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($product->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be deleted'
            ], 500);
        }
    }
}
