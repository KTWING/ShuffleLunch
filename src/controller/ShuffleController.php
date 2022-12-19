<?php

class ShuffleController extends Controller
{
    public function index()
    {
        return $this->render([
            'groups' => [],
            'errors' => [],
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }

        $groups = [];
        $errors = [];

        $employees = $this->databaseManager->get('Employee')->fetchAllNames();

        shuffle($employees);
        $cnt = count($employees);
        $groupNumber = $_POST['numbers'];

        if ($groupNumber < 1) {
            $errors['numbers'] = 'グループの人数は1人以上にしてください';
        } elseif ($groupNumber * 2 > $cnt) {
            $errors['numbers'] = 'グループの人数は全人数の半数以下にしてください';
        }

        if (!count($errors)) {
            $groups = array_chunk($employees, $groupNumber);
            $lastKey = array_key_last($groups);
            $quotient = floor($cnt / $groupNumber);
            $remainder = $cnt % $groupNumber;

            if (count($groups[$lastKey]) < $groupNumber) {
                $i = 0;
                while ($i <= $remainder - 1) {
                    $adjustmentKey = $i % $quotient;
                    array_push($groups[$adjustmentKey], $groups[$lastKey][$i]);
                    $i++;
                }
                array_splice($groups, $lastKey, 1);
            }
        }

        return $this->render([
            'groups' => $groups,
            'errors' => $errors,
        ], 'index');
    }
}
