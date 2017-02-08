<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $service;

    protected $request;

    protected $moduleName;


    /**
     * Get method
     *
     * @return mixed
     */
    public function index()
    {
        $list = $this->service->all()->toArray();
        return view($this->moduleName . '.admin.index', compact('list'));
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
        return view($this->moduleName . '.admin.create');
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
        return view($this->moduleName . '.admin.edit', compact('item'));
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

        return $this->service->update($id, $request->all());
    }

    /**
     * Delete method
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route($this->moduleName . '.admin.index');
    }

    /**
     * @return Request
     */
    public function getValidationRequest()
    {
        return app($this->request);
    }
}
