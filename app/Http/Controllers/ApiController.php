<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    protected $statusCode = 200;

    public function authUser()
    {
        return  Auth::guard('api')->user();
    }
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound($message = 'Not found!')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respondWithError($message, $errors = null)
    {
        return $this->respond([
            'message' => $message,
            'status_code' => $this->getStatusCode(),
            'errors' => $errors
        ]);
    }

    /**
     * @param $lessons
     * @return mixed
     */
    protected function respondWithPagination(Paginator $lessons, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->total(),
                'total_pages' => ceil($lessons->total() / $lessons->perPage()),
                'current_page' => $lessons->currentPage(),
                'limit' => $lessons->perPage()
            ]
        ]);

        return $this->respond($data);
    }

    public function respond($data, $headers = [])
    {
        return Response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondCreated($data, $message)
    {
        $data = array_merge($data, [
            'message' => $message
        ]);
        return $this->setStatusCode(201)->respond($data);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondUnprocessable($message = 'Resource create failed' , $errors = null)
    {
        return $this->setStatusCode(422)->respondWithError($message, $errors);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function reponseDestroyed($data, $message)
    {
        $data = array_merge($data, [
            'message' => $message
        ]);
        return $this->setStatusCode(202)->respond($data);
    }

}
