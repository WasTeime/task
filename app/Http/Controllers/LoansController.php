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

    private string $dataFilePath = '../storage/app/data.txt';

    private function saveNewLoan(Loan $loan)
    {
        file_put_contents($this->dataFilePath, $loan->toJson(), FILE_APPEND);
    }

    private function getLoansFromFile()
    {
        return json_decode(file_get_contents($this->dataFilePath));
    }

    public function getAllLoans()
    {
        return $this->successResponse($this->getLoansFromFile());
    }

    public function getLoan($id)
    {
        foreach($this->getLoansFromFile() as $loan) {
            print_r($this->getLoansFromFile());
        }
    }

    public function createLoan(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'name' => 'required',
                'sum' => 'required|numeric'
            ]);

            $now = new DateTime();
            $loan = new Loan($this::$id, "loan1", random_int(1000, 10000000) * 0.85, $now->getTimestamp());
            $this->saveNewLoan($loan);
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
