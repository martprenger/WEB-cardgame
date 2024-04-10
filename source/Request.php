<?php

namespace Source;

use Source\models\User;

class Request
{
    private $user;

    public function __construct(private array $superglobals = []) {
    }

    public static function createFromGlobals(): Request {
        return new self([
            'GET' => $_GET,
            'POST' => $_POST,
            'COOKIE' => $_COOKIE,
            'SERVER' => $_SERVER,
            'FILES' => $_FILES,
            'REQUEST' => $_REQUEST,
            'SESSION' => isset($_SESSION) ? $_SESSION : null,
            'ENV' => $_ENV,
        ]);
    }

    public function getSuperglobals() {
        return $this->superglobals;
    }

    public function getSuperglobal($name) {
        return isset($this->superglobals[$name]) ? $this->superglobals[$name] : null;
    }

    public function getMethod() {
        return isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
    }

    public function getPath() {
        return isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : null;
    }

    public function setParameters(array $matches)
    {
        $this->superglobals['REQUEST'] = $matches;

    }

    public function getParameter(string $name)
    {
        return isset($this->superglobals['REQUEST'][$name]) ? $this->superglobals['REQUEST'][$name] : null;
    }

    public function getCookie($name) {
        return isset($this->superglobals['COOKIE'][$name]) ? $this->superglobals['COOKIE'][$name] : null;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

}

