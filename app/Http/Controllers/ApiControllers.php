<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class ApiControllers extends Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Request $request
     */
    public function get(Request $request) {

        $limit = (int) $request->get('limit', 100);
        $offset = (int) $request->get('offset', 0);

        $result = $this->model->limit($limit)->offset($offset)->get();

        $this->sendResponse($result, 'OK',200);

    }

    /**
     * @param int $entityId
     * @return mixed
     */
    public function detail(int $entityId) {

        $entity = $this->model->find($entityId)->first();

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        return $this->sendResponse($entity, 'OK',200);

    }

    /**
     * @param int $entityId
     * @param Request $request
     * @return mixed
     */
    public function update(int $entityId, Request $request) {

        $entity = $this->model->find($entityId)->first();

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendResponse(null, 'Updated',204);
    }

    /**
     * @param int $entityId
     * @return mixed
     */
    public function delete(int $entityId) {

        $entity = $this->model->find($entityId);

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        $entity->delete();

        return $this->sendResponse(null, 'Deleted',204);

    }

    public function create(Request $request) {

        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendResponse(null, 'Created', 201);

    }

}
