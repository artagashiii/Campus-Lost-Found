<?php
require_once __DIR__ . '/IdObject.php';

class User extends IdObject {
    private $email;
    private $role;

    public function __construct($id, $email, $role) {
        parent::__construct($id);   
        $this->email = $email;
        $this->role  = $role;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isStudent() {
        return $this->role === 'student';
    }
}
?>
