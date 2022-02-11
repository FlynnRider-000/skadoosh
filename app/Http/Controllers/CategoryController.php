<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Category\CategoryService;


class CategoryController extends Controller
{
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data['categories'] = $this->categoryService->findAllWithoutActiveStatus();

        return view('admin.category.list', $data);
    }

    /**
     * Load categories by ajax
     */

    public function loadCategories(Request $request) {
        ## Read value
        $draw       = $request->get('draw');
        $start      = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr    = $request->get('order');
        $columnName_arr     = $request->get('columns');
        $order_arr          = $request->get('order');
        $search_arr         = $request->get('search');

        $columnIndex        = $columnIndex_arr[0]['column']; // Column index
        $columnName         = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder    = $order_arr[0]['dir']; // asc or desc
        $searchValue        = $search_arr['value']; // Search value

        // Total records
        $totalRecords           = Category::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Category::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Category::orderBy($columnName,$columnSortOrder)
                        ->where('name', 'like', '%' .$searchValue . '%')
                        ->select('categories.*')
                        ->skip($start)
                        ->take($rowperpage)
                        ->get();

        $data_arr = array();
        
        foreach($records as $index => $record){
            $editLink = "<a href='".url('admin/category/'. $record->id . '/edit')."'>
                            <i class='bx bx-edit text-primary'></i> Edit
                        </a>";
            $deleteLink = "<a class='categoryDelete' href='".url('admin/category', ['id'=>$record->id])."'>
                            <i class='bx bx-trash text-danger'></i> Delete
                        </a>";
            $data_arr[] = array(
                "id"        => ($index+1),
                "name"     => $record->name,
                "active"   => ($record->active == 1 ? '<span class="badge rounded-pill bg-success">active</span>' : '<span class="badge rounded-pill bg-danger">inactive</span>'),
                "action"    => $editLink.' '.$deleteLink
            );
        }

        $response = array(
            "draw"                  => intval($draw),
            "iTotalRecords"         => $totalRecords,
            "iTotalDisplayRecords"  => $totalRecordswithFilter,
            "aaData"                => $data_arr
        );

        return response()->json($response);
    }     

    public function create()
    {
        return view('admin.category.create');
    }


    public function store( Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required |unique:categories,name',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $data = $request->all();
        
        isset($request->active) ? $data['active'] = 1 : $data['active'] = 0;

        $this->categoryService->create($data);

        session()->flash('message', 'Category has been created successfully.');
        return redirect('admin/category');
    }


    public function edit($id)
    {
        $data['categories'] = $this->categoryService->find($id);
        return view('admin.category.edit', $data);
    }


    public function update( Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required |unique:categories,name,' . $id,
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $data = $request->all();
        isset($request->active) ? $data['active'] = 1 : $data['active'] = 0;
        
        $this->categoryService->update($id, $data);

        session()->flash('message', 'Category has been updated successfully.');
        return redirect('admin/category');
    }


    public function destroy($id)
    {
        $category = $this->categoryService->find($id);
        if (!empty($category)) {
            $category->delete();
            session()->flash('message', '');
            return response()->json(['status'=> 1, 'message'=>'Category has been deleted successfully.']);
        } else {
            return response()->json(['status'=> 0, 'message'=>'Something went wrong.']);
        }
    }
}