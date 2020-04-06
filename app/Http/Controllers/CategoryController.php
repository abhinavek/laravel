<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Display all category
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create category
        return view('errors.503');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array('category_name'=>'required|unique:categories|max:255'));
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        session::flash('success','New category has been created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::orderBy('id','desc')->paginate(5);
        $category = Category::find($id);
        return view('categories.index')->withCategoryone($category)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update
        $this->validate($request,array(
            'category_name' => 'required|unique:categories|max:255'
        ));
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        Session::flash('success',$request->category_name.' Updated successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete
        $category = Category::find($id);
        $category->delete($id);
        Session::flash('success',$category->category_name.' Deleted successfully');
        return redirect()->back();
    }
    public function test()
    {
        echo 6/2*(1+2);
    }
}
