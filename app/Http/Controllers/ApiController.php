<?php
namespace App\Http\Controllers;

use App\Actions\Base\DestroyAction;
use App\Actions\Base\IndexAction;
use App\Actions\Base\ShowAction;
use App\Transformers\Transformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Router;
use App\Http\Requests;

/**
 *
 */
class ApiController extends Controller
{
    /**
     * Main data array for all views.
     *
     * @var array
     */
    public $data = [];

    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @var Transformer
     */
    protected $transformer;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->controller->respond($this->controller->service->getItems($this->request));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        if(isset($id['primaryKey'])) {
            $id = $id->$id['primaryKey'];
        }

        $model = $this->controller->service->getItem($id, null, null, false);
        if ( ! $model) {
            return $this->controller->respondNotFound();
        }

        $model->delete();

        return $this->controller->setStatusCode(Response::HTTP_NO_CONTENT)->respond([]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        if(isset($id['primaryKey'])) {
            $id = $id->$id['primaryKey'];
        }

        $model = $this->controller->service->getItem($id, null, null, false);
        if (!$model) {
            return $this->controller->respondNotFound();
        }

        $this->controller->service->update($id, $this->request->all(), $model['primaryKey']);
        $item = $this->controller->service->getModel(true, $this->request);

        return $this->controller->setStatusCode(Response::HTTP_CREATED)->respond($item);
    }

    /**
     * @return mixed
     */
    public function show()
    {
        if(isset($id['primaryKey'])) {
            $id = $id->$id['primaryKey'];
        }

        $item = $this->controller->service->getItem($id, $this->request);
        if ($item) {
            return $this->controller->respond($item);
        } else {
            return $this->controller->respondNotFound();
        }
    }

    /**
     * @return mixed
     */
    public function store()
    {
        $this->controller->service->create($this->request->all());
        $item = $this->controller->service->getModel(true, $this->request);

        return $this->controller->setStatusCode(Response::HTTP_CREATED)->respond($item);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return ApiController
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondNotFound($message = 'Not found!')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param array $data
     * @return Response
     */
    public function respondValidationErrors($data)
    {
        return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)->respond($data);
    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondInternalError($message = 'External error!')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param $message
     * @return Response
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * Ответ в виде json
     *
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
    public function respond($data, $headers = [])
    {
        return response($data, $this->getStatusCode(), $headers);
    }

    /**
     * Render the current view.
     *
     * @param String $view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render($view)
    {
        if (view()->exists($view)) {
            return view($view, $this->data);
        }

        abort(404);
    }

    public function getRequest()
    {
        $route = app(Router::class);
        $action = explode('.', $route->getCurrentRoute()->getAction()['as']);
        $request = 'App\Http\Requests\\' . ucfirst($action[count($action) - 2]) . 'Request';

        $request = class_exists($request) ? $request : 'App\Http\Requests\Request';
        return app($request);
    }
}