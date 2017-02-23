<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $service;

    protected $request;

    protected $module;

    protected $moduleName;

    /**
     * Get method
     *
     * @return mixed
     */
    public function index()
    {
        $list = $this->service->all();
        return $list;
    }

    /**
     * Get method
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $list = $this->service->find($id);
        return $list;
    }

    /**
     * Post method
     *
     * @return mixed
     */
    public function store()
    {
        $request = $this->getValidationRequest();

        return $this->service->create($request->all());
    }

    /**
     * Get method
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.' . $this->module . '.create');
    }

    /**
     * Get method, render edit form
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $item = $this->service->find($id);
        return view('admin.' . $this->module . '.edit', compact('item'));
    }

    /**
     * Put method, save item
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $request = $this->getValidationRequest();
        $response = $this->service->update($id, $request->all());
        return $response['status'] == 1 ? response($response, 200) : response($response, 422);
    }

    /**
     * Delete method
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    /**
     * @return Request
     */
    public function getValidationRequest()
    {
        return app($this->request);
    }
}
