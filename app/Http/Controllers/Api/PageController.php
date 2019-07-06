<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
class PageController extends Controller
{
    public function index()
	    {
	        $pagecat = auth()->user()->Page;
	 
	        return response()->json([
	            'success' => true,
	            'data' => $pagecat
	        ]);
	    }





     public function show($id)
		    {
		        $pagecat = auth()->user()->Page()->find($id);
		 
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
		            'catg_id' => 'integer',
		            'content' => 'required'
		        ]);
		 
		        $pagecat = new Page();
		        $pagecat->catg_id = $request->catg_id;
		        $pagecat->content = $request->content;
		        $pagecat->slug = str_slug($request->content);
		 
		        if (auth()->user()->Page()->save($pagecat))
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
		        $pagecat = auth()->user()->Page()->find($id);
		 
		        if (!$pagecat) {
		            return response()->json([
		                'success' => false,
		                'message' => 'pagecat with id ' . $id . ' not found'
		            ], 400);
		        }
		        $this->validate($request, [
				            'catg_id' => 'required|integer',
				            'content' => 'required'
				        ]);
				 
				        $pagecat->catg_id = $request->catg_id;
				        $pagecat->content = $request->content;
				        $pagecat->slug = str_slug($request->content);
		 
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
        $product = auth()->user()->Page()->find($id);
 
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
