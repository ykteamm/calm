<?php

namespace App\Traits;

trait ResolveResponse
{
    /**
     * HTTP response data.
     * @var mixed
     */
    protected $data = null;

    /**
     * HTTP status code.
     * @var int
     */
    protected $code = 200;

    /**
     * HTTP status code.
     * @var string
     */
    protected $message = null;

    /**
     * HTTP status code.
     * @var string
     */
    protected $status = 1;

    public function setResponseData($status = 1, $data = null, $message = null, $code = 200)
    {
        if(is_array($status)) {
            if(isset($status['data'])) $this->data = $data['data'];
            if(isset($data['message'])) $this->message = $data['message'];
            if(isset($data['code'])) $this->code = $data['code'];
            if(isset($data['status'])) $this->status = $data['status'];
        }
        $this->status = $status;
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
    }

    public function makeResponse($status = 1, $data = null, $message = null, $code = 200)
    {
        $this->setResponseData($status, $data, $message, $code);
        return $this->response();
    }
    
    protected function response()
    {
        if ($this->code == 204) return response()->json([], $this->code);
        elseif($this->status) return response()->json($this->data, $this->code);
        else return response()->json(['message' => $this->message], $this->code);
    }
}
