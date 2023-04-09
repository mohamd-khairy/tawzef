<?php

namespace Modules\CMS\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CMS\Http\Controllers\Actions\SearchCmsManagementsQueryAction;
use Modules\CMS\Http\Controllers\Actions\CreateCmsManagementAction;
use Modules\CMS\Http\Controllers\Actions\DeleteCmsManagementAction;
use Modules\CMS\Http\Controllers\Actions\GetCmsManagementAction;
use Modules\CMS\Http\Controllers\Actions\UpdateCmsManagementAction;
use Modules\CMS\Http\Requests\CreateCmsManagementRequest;
use Modules\CMS\Http\Requests\DeleteCmsManagementRequest;
use Modules\CMS\Http\Requests\UpdateCmsManagementRequest;
use Modules\CMS\Http\Resources\AboutResource;
use Modules\CMS\About;
use App\Http\Helpers\ServiceResponse;
use Carbon\Carbon;
use Auth, Lang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Yajra\Datatables\Datatables;
use App\Language;
use Modules\CMS\CmsManagement;

class SocialsController extends Controller
{
    /**
     * Store social
     *
     * @param  [integer] order
     * @param  [array] translations
     * @return [json] ServiceResponse object
     */
    public function store(CreateCmsManagementRequest $request, CreateCmsManagementAction $action)
    {
        // Create the social
        $social = $action->execute($request->except([]), $request->translations);

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'social created successfully';
        $resp->status = true;
        $resp->data = $social;
        return response()->json($resp, 200);
    }

    /**
     * Update social
     *
     * @param  [integer] id
     * @param  [integer] order
     * @param  [array] translations
     * @return [json] ServiceResponse object
     */
    public function update(UpdateCmsManagementRequest $request, UpdateCmsManagementAction $action)
    {
        // Update the social
        $social = $action->execute($request->input('id'), $request->except(['id']), $request->translations);

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'social updated successfully';
        $resp->status = true;
        $resp->data = $social;
        return response()->json($resp, 200);
    }

    /**
     * Delete social
     *
     * @param  [integer] id
     * @return [json] ServiceResponse object
     */
    public function delete(DeleteCmsManagementRequest $request, DeleteCmsManagementAction $action)
    {
        // Delete the social
        $action->execute($request->input('id'));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'social deleted successfully';
        $resp->status = true;
        $resp->data = null;
        return response()->json($resp, 200);
    }

    /**
     * Index social
     * @return Response
     */
    public function index(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        if ($request->isMethod('POST')) {
            // Search the social
            $action = new SearchCmsManagementsQueryAction;
            $social = $action->execute($auth_user, $request)->where('type','social');

            return Datatables::of($social)
                ->addColumn('title', function ($social) {
                    return $social->title ? $social->title : $social->default_title ;
                })
                ->filterColumn('title', function($query, $keyword) {
                    $query->whereHas('translations', function($translation) use ($keyword) {
                        $translation->where('title', 'like', '%'.$keyword.'%');
                    });
                })
                ->addColumn('created_at', function ($social) {
                    return $social->created_at ? $social->created_at->toDateTimeString() : null;
                })
                ->addColumn('last_updated_at', function ($social) {
                    return $social->updated_at ? $social->updated_at->toDateTimeString() : null;
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
            return view('cms::social.' . $blade_name);
        }
    }

    /**
     * Create social
     * @return Response
     */
    public function create(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        // Get the languages
        $languages = Language::all();

        $blade_name = ($request->ajax() ? 'create-partial' : 'create'); // Handle Partial Return

        return view('cms::social.' . $blade_name, compact('languages'), []);
    }

    public function createsocialModal(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        // Get the languages
        $languages = Language::all();

        return view('cms::social.modals.create', compact('languages'), [])->render();
    }

    public function UpdatesocialModal(Request $request, $id = null)
    {
        // Auth user
        $auth_user = Auth::user();

        $social = CmsManagement::find($id);

        // If social does not exist, return error div
        if (!$social) {
            $error = Lang::get('cms::cms.social_secion_not_found_or_you_are_not_authorized_to_edit_the_social_section');
            return view('dashboard.components.error', compact('error'))->render();
        }

        // Get the languages
        $languages = Language::all();

        return view('cms::social.modals.update', compact('social', 'languages'), [])->render();
    }
}
