<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageCategory;
class PageCategoryController extends Controller
{
     public function index()
	    {
	        $pagecat = auth()->user()->PageCategory;
	 
	        return response()->json([
	            'success' => true,
	            'data' => $pagecat
	        ]);
	    }





     public function show($id)
		    {
		        $pagecat = auth()->user()->PageCategory()->find($id);
		 
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

    /// for inserting data
        public function store(Request $request)
		    {
		        $this->validate($request, [
		            'parent' => 'integer',
		            'title' => 'required'
		        ]);
		 
		        $pagecat = new PageCategory();
		        $pagecat->parent = $request->parent;
		        $pagecat->title = $request->title;
		        $pagecat->slug = str_slug($request->title);
		 
		        if (auth()->user()->PageCategory()->save($pagecat))
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




		    //for updating data

		public function update(Request $request, $id)
		    {
		        $pagecat = auth()->user()->PageCategory()->find($id);
		 
		        if (!$pagecat) {
		            return response()->json([
		                'success' => false,
		                'message' => 'pagecat with id ' . $id . ' not found'
		            ], 400);
		        }
		        $this->validate($request, [
				            'parent' => 'required|integer',
				            'title' => 'required'
				        ]);
				 
				        $pagecat->parent = $request->parent;
				        $pagecat->title = $request->title;
				        $pagecat->slug = str_slug($request->title);
		 
		        $updated = $pagecat->save();
		 
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
        $product = auth()->user()->PageCategory()->find($id);
 
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
