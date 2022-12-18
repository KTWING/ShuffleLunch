<?php

class Response
{
    protected $content;
    protected $statusCode;
    protected $statusText;

    public function send()
    {
        header('HTTP/1.1' . $this->statusCode . ' ' . $this->statusText);
        echo $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatusCode($statusCode, $statusText)
    {
        $this->statusCode = $statusCode;
        $this->statusText = $statusText;
    }
}
