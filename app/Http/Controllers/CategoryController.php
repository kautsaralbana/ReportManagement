<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Categories|Manage Categories', ['only' => 'index']);
        $this->middleware('permission:Manage Categories', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::orderBy('created_at', 'DESC')->paginate(5);
        $user_categories = Category::orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        return view('categories.index', compact('categories', 'user', 'user_categories'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string|max:50',
        ]);
        $categories = new Category;
        $categories->name = $request->name;
        $categories->is_active = 0;
        $categories->created_by = Auth::id();
        $categories->save();

        return redirect()->back()
            ->with(['success' => 'Category: ' . $categories->name . ' Succesfully Created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_category)
    {
        $categories = Category::findOrFail($id_category);
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_category)
    {
        request()->validate([
            'name' => 'required|string|max:50',
        ]);

        try {
            $categories = Category::findOrFail($id_category);
            $categories->name = $request->name;
            $categories->updated_by = Auth::id();
            $categories->save();
            return redirect(route('categories.index'))->with(['success' => 'Type: ' . $categories->name . ' Changed']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_category)
    {
        $categories = Category::findOrFail($id_category);
        $categories->delete();
        return redirect()->back()->with(['warning' => 'Category: ' . $categories->name . ' Succesfully Deleted']);
    }
}
