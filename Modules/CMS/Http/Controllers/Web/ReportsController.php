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

class ReportsController extends Controller
{
    /**
     * Store report
     *
     * @param  [integer] order
     * @param  [array] translations 
     * @return [json] ServiceResponse object
     */
    public function store(CreateCmsManagementRequest $request, CreateCmsManagementAction $action)
    {
        // Create the report
        $report = $action->execute($request->except([]), $request->translations);

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'report created successfully';
        $resp->status = true;
        $resp->data = $report;
        return response()->json($resp, 200);
    }

    /**
     * Update report
     *
     * @param  [integer] id
     * @param  [integer] order
     * @param  [array] translations 
     * @return [json] ServiceResponse object
     */
    public function update(UpdateCmsManagementRequest $request, UpdateCmsManagementAction $action)
    {
        // Update the report
        $report = $action->execute($request->input('id'), $request->except(['id']), $request->translations);

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'report updated successfully';
        $resp->status = true;
        $resp->data = $report;
        return response()->json($resp, 200);
    }

    /**
     * Delete report
     *
     * @param  [integer] id
     * @return [json] ServiceResponse object
     */
    public function delete(DeleteCmsManagementRequest $request, DeleteCmsManagementAction $action)
    {
        // Delete the report
        $action->execute($request->input('id'));

        // Return the response
        $resp = new ServiceResponse;
        $resp->message = 'report deleted successfully';
        $resp->status = true;
        $resp->data = null;
        return response()->json($resp, 200);
    }

    /**
     * Index report 
     * @return Response
     */
    public function index(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        if ($request->isMethod('POST')) {
            // Search the report 
            $action = new SearchCmsManagementsQueryAction;
            $report = $action->execute($auth_user, $request)->where('type','report');

            return Datatables::of($report)
                ->addColumn('title', function ($report) {
                    return $report->title ? $report->title : $report->default_title ;
                })
                ->filterColumn('title', function($query, $keyword) {
                    $query->whereHas('translations', function($translation) use ($keyword) {
                        $translation->where('title', 'like', '%'.$keyword.'%');
                    });
                })
                ->addColumn('created_at', function ($report) {
                    return $report->created_at ? $report->created_at->toDateTimeString() : null;
                })
                ->addColumn('last_updated_at', function ($report) {
                    return $report->updated_at ? $report->updated_at->toDateTimeString() : null;
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
            return view('cms::report.' . $blade_name);
        }
    }

    /**
     * Create report
     * @return Response
     */
    public function create(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        // Get the languages
        $languages = Language::all();

        $blade_name = ($request->ajax() ? 'create-partial' : 'create'); // Handle Partial Return

        return view('cms::report.' . $blade_name, compact('languages'), []);
    }

    public function createReportModal(Request $request)
    {
        // Auth user
        $auth_user = Auth::user();

        // Get the languages
        $languages = Language::all();

        return view('cms::report.modals.create', compact('languages'), [])->render();
    }

    public function UpdateReportModal(Request $request, $id = null)
    {
        // Auth user
        $auth_user = Auth::user();

        $report = CmsManagement::find($id);

        // If report does not exist, return error div
        if (!$report) {
            $error = Lang::get('cms::cms.report_secion_not_found_or_you_are_not_authorized_to_edit_the_report_section');
            return view('dashboard.components.error', compact('error'))->render();
        }

        // Get the languages
        $languages = Language::all();

        return view('cms::report.modals.update', compact('report', 'languages'), [])->render();
    }
}
