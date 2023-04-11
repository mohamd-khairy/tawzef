<?php

namespace Modules\Categories\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Categories\Http\Controllers\Actions\CreateCatAction;
use Modules\Categories\Http\Controllers\Actions\DeleteCatAction;
use Modules\Categories\Http\Controllers\Actions\GetCategoriesAction;
use Modules\Categories\Http\Controllers\Actions\SearchCatsQueryAction;
use Modules\Categories\Http\Controllers\Actions\UpdateCatAction;
use Modules\Categories\Http\Requests\CreateCatRequest;
use Modules\Categories\Http\Requests\DeleteCatRequest;
use Modules\Categories\Http\Requests\GetCategoriesRequest;
use Modules\Categories\Http\Requests\UpdateCatRequest;
use Modules\Categories\Http\Resources\CategoryResource;
use Modules\Categories\Category;
use App\Http\Helpers\ServiceResponse;
use App\Http\Resources\MediaResource;
use Carbon\Carbon;
use Auth, Lang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Yajra\Datatables\Datatables;
use App\Language;

class CategoriesController extends Controller
{


    /**
     * Store Cat
     *php artisan module:make-request CreateCatRequest Categories
     * php artisan module:make-request DeleteCatRequest Categories
     * php artisan module:make-request GetCategoriesRequest Categories
     * php artisan module:make-request UpdateCatRequest Categories
     *php artisan module:make-resource CategoryResource Categories
     * @param  [array] translations
     * @param  [boolean] is_featured
     * @param  [date] start_date
     * @param  [date] end_date
     * @return [json] ServiceResponse object
     */
    public function store(CreateCatRequest $request, CreateCatAction $action)
    {
        // Create the Cat
        $cat = $action->execute($request->except(['attachments']));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Category created successfully';
        $resp->status = true;
        $resp->data = ['redirect_to' => route('categories.index'), 'cat' => $cat];

        return response()->json($resp, 200);
    }
    /**
     * Update Cat
     *
     * @param  [integer] id
     * @param  [array] translations
     * @param  [boolean] is_featured
     * @param  [date] start_date
     * @param  [date] end_date
     * @return [json] ServiceResponse object
     */
    public function update(UpdateCatRequest $request, UpdateCatAction $action)
    {
        // Update the Cat
        $cat = $action->execute($request->input('id'), $request->except(['id']));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Category updated successfully';
        $resp->status = true;
        $resp->data = $cat;

        return response()->json($resp, 200);
    }
    /**
     * Delete Cat
     *
     * @param  [integer] id
     * @return [json] ServiceResponse object
     */
    public function delete(DeleteCatRequest $request, DeleteCatAction $action)
    {
        // Delete the Cat
        $action->execute($request->input('id'));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'Category deleted successfully';
        $resp->status = true;
        $resp->data = null;
        return response()->json($resp, 200);
    }

    /**
     * Index Categories
     * @return Response
     */
    public function index(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        if ($request->isMethod('POST')) {

            // Search the Categories
            $action = new SearchCatsQueryAction;
            $cats = $action->execute($auth_user, $request);

            return Datatables::of($cats)
            ->addColumn('title', function ($service) {
                return $service->title;
            })
            ->filterColumn('title', function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('title_en', 'like', '%' . $keyword . '%')
                    ->orwhere('title_ar', 'like', '%' . $keyword . '%');
                });
            })
                ->addColumn('created_at', function ($cat) {
                    return $cat->created_at;
                })
                ->addColumn('last_updated_at', function ($cat) {
                    return $cat->updated_at;
                })
                ->orderColumn('created_at', function ($query, $order) {
                    return  $query->orderBy('created_at', $order);
                })
                ->orderColumn('last_updated_at', function ($query, $order) {
                    return  $query->orderBy('updated_at', $order);
                })
                ->make(true);
        } else {
            $blade_name = ($request->ajax() ? 'index-partial' : 'index'); // Handle Partial Return

            return view('categories::cats.' . $blade_name);
        }
    }

    /**
     * Create Cat
     * @return Response
     */
    public function create(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        // Get the languages
        $languages = Language::all();

        $parents = Category::all()->pluck('title', 'id')->prepend(__('categories::category.select_category'), '');

//        dd($categories);
        $blade_name = ($request->ajax() ? 'create-partial' : 'create'); // Handle Partial Return

        return view('categories::cats.' . $blade_name, compact('languages','parents'), []);
    }

    public function createCatModal(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();
        $parents = Category::all()->pluck('title', 'id')->prepend(__('categories::category.select_category'), '');

        return view('categories::cats.modals.create',compact('parents'), [])->render();
    }

    public function UpdateCatModal(Request $request, $id = null)
    {
        // Auth user
        $auth_user = Auth::user();

        $cat = Category::find($id);

        $parents = Category::all()->pluck('title', 'id')->prepend(__('categories::category.select_category'), '');

        // If Ad does not exist, return error div
        if (!$cat) {
            $error = Lang::get('categories::category.Category_not_found_or_you_are_not_authorized_to_edit_the_Category');

            return view('dashboard.components.error', compact('error','parents'))->render();
        }
        // Get the languages
        $languages = Language::all();

        return view('categories::cats.modals.update', compact('cat', 'languages','parents'), [])->render();
    }
}
