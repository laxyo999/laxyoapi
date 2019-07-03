<?php

namespace App\Http\Controllers;
use App\pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   
   public function index()
    {
        $page = auth()->user()->pages;
 
        return response()->json([
            'success' => true,
            'data' => $page
        ]);
    }



public function show($id)
    {
        $page = auth()->user()->pages()->find($id);
 
        if (!$page) {
            return response()->json([
                'success' => false,
                'message' => 'page with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $page->toArray()
        ], 400);
    }






     public function store(Request $request)
		    {
		        $this->validate($request, [
		            'catg_id' => 'required',
		            'content' => 'required',
		           
		        ]);
		 
		        $page = new pages();
		        $page->catg_id = $request->catg_id;
		        $page->content = $request->content;
		        
		 
		        if (auth()->user()->pages()->save($page))
		            return response()->json([
		                'success' => true,
		                'data' => $page->toArray()
		            ]);
		        else
		            return response()->json([
		                'success' => false,
		                'message' => 'page could not be added'
		            ], 500);
		    }

  			//for Update data
            
            public function update($id)
		    {
		    	return request()->all();
		        // $page = auth()->user()->pages()->find($id);

		 
		        // if (!$page) {
		        //     return response()->json([
		        //         'success' => false,
		        //         'message' => 'page with id ' . $id . ' not found'
		        //     ], 400);
		        // }
		 
		        // $updated = $page->fill($request->all())->save();
		 
		        // if ($updated)
		        //     return response()->json([
		        //         'success' => true,
		        //         'message' => 'updated successfull'
		        //     ]);
		        // else
		        //     return response()->json([
		        //         'success' => false,
		        //         'message' => 'page could not be updated'
		        //     ], 500);
		    }




		    //for delete data

		       public function destroy($id)
		    {
		        $page = auth()->user()->pages()->find($id);
		 
		        if (!$page) {
		            return response()->json([
		                'success' => false,
		                'message' => 'page with id ' . $id . ' not found'
		            ], 400);
		        }
		 
		        if ($page->delete()) {
		            return response()->json([
		                'success' => dio_truncate(fd, offset)
		            ]);
		        } else {
		            return response()->json([
		                'success' => false,
		                'message' => 'Product could not be deleted'
		            ], 500);
		        }
		    }


}
