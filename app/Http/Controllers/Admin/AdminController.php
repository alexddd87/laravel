<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $list = $this->service->all()->toArray();
        return view('content.admin.index', compact('list'));
    }

    /**
     * @return mixed
     */
    public function store()
    {
        return $this->service->create();
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->service->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        return $this->service->update($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->service->all();
    }
}
