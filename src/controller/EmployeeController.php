<?php

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = $this->databaseManager->get('Employee')->fetchAllNames();

        return $this->render([
            'title' => '社員の登録',
            'employees' => $employees,
            'errors' => [],
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }

        $errors = [];

        $employee = $this->databaseManager->get('Employee');

        if (!strlen($_POST['name'])) {
            $errors['name'] = '社員名を入力してください';
        } elseif (strlen($_POST['name']) > 100) {
            $errors['name'] = '社員名は100文字以内で入力してください';
        }

        if (!count($errors)) {
            $employee->insert($_POST['name']);
        }

        $employees = $employee->fetchAllNames();

        return $this->render([
            'title' => '社員の登録',
            'employees' => $employees,
            'errors' => $errors,
        ], 'index');
    }
}
