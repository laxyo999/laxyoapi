<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageCategory;
class PageCategoryController extends Controller
{
    public function index(){
        $pagec = PageCategory::All();
        return view('pagecat.index', compact('pagec'));
    }

    public function create(){
        return view('pagecat.create');
    }



      public function store(Request $request){

        $pagec = new PageCategory();
        $pagec->user_id = 1;
        $pagec->parent = $request->parent;
        $pagec->title = $request->title;
        $pagec->slug = str_slug($request->title);
        $pagec->save();
        return redirect('/admin/PageCategory')->with('success', 'Data Inserted Successfully');
    }



        public function edit($id){
            $pagec = PageCategory::find($id);
            return view('pagecat.edit', compact('pagec'));
            }



         public function update(Request $request, $id){
            
            $pagec = PageCategory::find($id);
            $pagec->parent = $request->parent;
            $pagec->title= $request->title; 
            $pagec->slug = str_slug($request->title);
            $pagec->save();
            return redirect('/admin/PageCategory')->with('success', 'Data updated Successfully');
          }




           public function show($id){
            // $page = Page::where('id', $id)->get();
     //        return view('page.show', compact('page'));
            }   

        public function destroy($id){
            $page = PageCategory::destroy($id);
            
            return redirect('/admin/PageCategory')->with('success', 'Data Deleted Successfully');
        }  
}
