<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    public function makeResponse($status = 1, $data = null, $message = null, $code = 200, $redirective = false)
    {
        $this->setResponseData($status, $data, $message, $code);
        return $this->response($redirective);
    }
    
    protected function response($redirective = false)
    {
        if ($redirective) {
            $result = new Result;
            if($this->status == 0) $result->setError($this->message);
            else $result->setData($this->data);
            return $result;
        } else {
            if ($this->data instanceof StreamedResponse) return $this->data;
            if ($this->code == 204) return response()->json([], $this->code);
            elseif($this->status == 1) return response()->json($this->data, $this->code);
            else return response()->json(['message' => $this->message], $this->code);
        }
    }
}

class Result
{
    protected $data = null;
    protected $key = 'error';
    protected $error = null;

    public function __construct($data = null)
    {
        $this->data = $data;       
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    public function redirect($ok = null, $no = null, $status = 302, $headers = [], $secure = null)
    {
        if($ok && !$no) $no = $ok; 
        if(str_contains($ok, '.')) $ok = route($ok);
        if(str_contains($no, '.')) $no = route($no);
        if ($this->error) {
            if ($no == 'back') {
                return back($status, $headers)->with($this->key, $this->error);
            }
            return redirect($no, $status, $headers, $secure)->with($this->key, $this->error);
        } else {
            if ($no == 'back') {
                return back($status, $headers);
            }
            return redirect($ok, $status, $headers, $secure);
        }
    }

    public function back($status = 302, $headers = [], $secure = null)
    {
        if ($this->error) {
            return back($status, $headers, $secure)->with($this->key, $this->error);
        } else {
            return back($status, $headers, $secure);
        }
    }

    public function errorKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function __toString()
    {
        if ($this->data && $this->data instanceof Collection) {
            return $this->data->toJson();
        } else if ($this->data && is_array($this->data)) {
            return json_encode($this->data);
        } else {
            return "data null";
        }
    }
}