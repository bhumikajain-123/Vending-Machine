<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminCategory;

class CategoryController extends Controller
{
        
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function view_products(){
        return view('admin.view_product',compact('categories'));
    }

    public function add_product(){
        return view('admin.add_product');
    }


    // =======================
    // ADD CATEGORY TO DB
    // =======================
    public function add_category(Request $req)
    {
        // validation
        $req->validate([
            "p_name" => "required",
            "p_comission" => "required"
        ]);

        // insert
        AdminCategory::create([
            "p_name"       => $req->p_name,
            "p_comission"  => $req->p_comission,
        ]);

        return redirect()
            ->back()
            ->with('mssg','Category Added Successfully');
    }


    // Show edit category form
public function edit_category($id)
{
    $category = AdminCategory::findOrFail($id); // get category or fail
    return view('admin.edit_category', compact('category'));
}

// Update category in DB
public function update_category(Request $req, $id)
{
    $req->validate([
        'p_name' => 'required',
        'p_comission' => 'required|numeric'
    ]);

    $category = AdminCategory::findOrFail($id);
    $category->update([
        'p_name' => $req->p_name,
        'p_comission' => $req->p_comission
    ]);

    return redirect()
        ->route('admin.view_product') // make sure route exists
        ->with('mssg', 'Category updated successfully');
}
// for delete
public function delete_category($id)
{
    $category = AdminCategory::findOrFail($id);
    $category->delete();

    return redirect()->back()->with('mssg', 'Category deleted successfully');
}


}
