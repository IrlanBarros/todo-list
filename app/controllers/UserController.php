<?php
require_once '../app/models/UserModel.php';

class UserController {
    private $User;

    public function __construct() {
        $this->User = new UserModel();
    }

    public function getAllUsers() {
        return $this->User->getAll('usuario');
    }

    public function getUserById(int $id) {
        return $this->User->getById('usuario', $id);
    }
}