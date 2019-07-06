<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\PageCategory;
class PageController extends Controller
{
    public function index(){
        $page = Page::all();
        return view('page.index', compact('page'));
    }

    public function create(){
        $page = PageCategory::all();

        return view('page.create', compact('page'));
    }
    public function store(Request $request){

    	$this->validate($request, [
          'catg_id' => 'required',
          'content' => 'required',
         ]);

    	$page = new Page();
        $page->user_id = 1;
    	$page->catg_id = $request->catg_id;
        $page->content = $request->content;
        $page->slug = str_slug($request->content);
        $page->save();
        return redirect('/admin/Page')->with('success', 'Data Inserted Successfully');
    }

	  public function edit($id){
	  	$page = Page::find($id);
        return view('page.edit', compact('page'));
	    }


      public function update(Request $request, $id){
         
    	 $rules = [
                'catg_id' => 'required',
                'content' => 'required',
            ];
            $this->validate($request, $rules);
            $page = Page::find($id);
            $page->catg_id = $request->catg_id;
            $page->content = $request->content;

            $page->save();
        return redirect('/admin/Page')->with('success', 'Data updated Successfully');
          }
        public function show($id){
		  	// $page = Page::where('id', $id)->get();
     //        return view('page.show', compact('page'));
		    }	

		public function destroy($id){
			$page = Page::destroy($id);
			
			return redirect('/admin/Page')->with('success', 'Data Deleted Successfully');
		}    

}
