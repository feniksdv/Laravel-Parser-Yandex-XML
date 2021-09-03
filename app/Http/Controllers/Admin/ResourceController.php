<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResourceRequest;
use App\Http\Requests\Admin\UpdateResourceRequest;
use App\Models\Category;
use App\Models\Resource;
use App\Models\Status;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): view
    {
        $url = Resource::paginate(
                config('paginate.admin.url')
            );

        return view("admin.resources.index", [
            'listUrls' => $url,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreResourceRequest $request
     * @return RedirectResponse
     */
    public function store(StoreResourceRequest $request): RedirectResponse
    {
        try {
            $category = Resource::create($request->validated())->save();
            if($category) {
                return redirect()->route('admin.resources.index')->with('success', __('messages.admin.resource.store.success'));
            }
        }
        catch (Exception $e) {
            return back()->withInput()->with('error', __('messages.admin.resource.store.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resource $resource
     * @return View
     */
    public function edit(Resource $resource): View
    {
        $listUrl = Resource::find($resource->id);

        return view('admin.resources.edit', [
            'listUrl' => $listUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateResourceRequest $request
     * @param Resource $resources
     * @return RedirectResponse
     */
    public function update(UpdateResourceRequest $request, Resource $resources): RedirectResponse
    {
        $url_ = $resources->fill($request->validated())->save();

        if($url_) {
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.resources.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.resources.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $resource
     * @return RedirectResponse
     */
    public function destroy(Resource $resource): RedirectResponse
    {
        Resource::where('id','=', $resource->id)->update(['status'=> 'off']);

        return redirect()->route('admin.resources.index')->with('success', __('messages.admin.resources.destroy.success'));
    }
}
