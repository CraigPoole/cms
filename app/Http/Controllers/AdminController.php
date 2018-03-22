<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        self::$menuOptions = ['Home'=> ''];
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = App\Page::all();
        return view('admin/admin',['pages' => $p]);
    }

    public function pageEdit($id)
    {
        $p = App\Page::findOrFail($id);
        return view('admin/page/edit',['page' => $p,'action' => "/page_edit/{$id}"]);
    }

    public function pageCreate()
    {
        $p = new App\Page();
        return view('admin/page/edit',['page' => $p,'action' => '/page_create']);
    }

    public function pageEditSubmit(Request $request,$id)
    {
        $p = App\Page::find($id);
        return $this->processPage($request,$p);
    }

    public function pageCreateSubmit(Request $request)
    {
        $p = new App\Page();
        return $this->processPage($request,$p);
    }

    private function processPage(Request $request,$page)
    {
        foreach ($page->getFillable() as $field)
        {
            if($request->filled($field))
                $page->$field = $request->input($field);
        }

        $page->save();

        return redirect("/page_edit/{$page->id}");
    }
}
