<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class LoansController extends Controller
{
    private static int $id = 0;

    private function saveNewLoan(Loan $loan)
    {

    }

    private function getLoans()
    {

    }

    public function __construct()
    {
        $now = new DateTime();
        json_encode([$this::$id => new Loan("loan1", random_int(1000, 10000000) * 0.85, $now->getTimestamp())]);
        $this::$id++;
    }

    public function getAllLoans()
    {
        print_r(sizeof($this->loans));
        return $this->successResponse($this->loans);
    }

    public function getLoan($id)
    {
        return array_key_exists($id, $this->loans) ? $this->successResponse($this->loans[$id]) : $this->errorResponse('Займ с таким id не найден');
    }

    public function createLoan(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'name' => 'required',
                'sum' => 'required|numeric'
            ]);

            $now = new DateTime();
            [$this::$id => new Loan($data['name'], $data['sum'], $now->getTimestamp())];
            $this::$id++;
            return $this->successResponse($this->loans[$this->id - 1]);
        } catch (ValidationException $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    public function updateLoan()
    {

    }

    public function deleteLoan()
    {

    }
}
