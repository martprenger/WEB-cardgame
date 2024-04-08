<?php

namespace access_control;

class Authorization
{
    private $rolesPermissions;

    public function __construct($rolesPermissions) {
        $this->rolesPermissions = $rolesPermissions;
    }

    public function checkPermission($role, $action) {
        if (!isset($this->rolesPermissions[$role])) {
            return false;
        }
        return in_array($action, $this->rolesPermissions[$role]);
    }

    public function requirePermission($action) {
        return function ($request, $response, $next) use ($action) {
            $role = $_SERVER['HTTP_X_USER_ROLE'] ?? null; // Assuming role is provided in a header
            if (!$role || !$this->checkPermission($role, $action)) {
                http_response_code(403); // Forbidden
                exit();
            }
            return $next($request, $response);
        };
    }
}