<?php



namespace App\Http\Controllers;


use App\Http\Requests\FreezeAcconutRequest;
use App\Http\Requests\OpenAccountRequest;
use App\Http\Requests\ViewAccountStatusRequest;
use App\Http\Requests\ViewAmountOfMoneyInAccountRequest;
use App\Repositories\AccountRepository;


class AccountController extends Controller
{
    public AccountRepository $AccountRepository;
    public function __construct(AccountRepository $AccountRepoInst)
    {
        $this->AccountRepository = $AccountRepoInst;
    }

    public function OpenAccount(OpenAccountRequest $request)
    {
        return $this->AccountRepository->OpenAccount($request);
    }

    public function CloseAccount($id)
    {
        return $this->AccountRepository->CloseAccount($id);
    }

    public function ViewAccountStatus(ViewAccountStatusRequest $ViewAccountStatusRequest)
    {
        return $this->AccountRepository->ViewAccountStatus($ViewAccountStatusRequest);
    }
    public function FreezeAccount(FreezeAcconutRequest $FreezeAcconutRequest)
    {
        return $this->AccountRepository->FreezeAccount($FreezeAcconutRequest);
    }
    public function unFreezeAccount(FreezeAcconutRequest $FreezeAcconutRequest)
    {
        return $this->AccountRepository->unFreezeAccount($FreezeAcconutRequest);
    }
    public function ViewAmountOfMoneyInAccount(ViewAmountOfMoneyInAccountRequest $ViewAmountOfMoneyInAccountRequest)
    {
        return $this->AccountRepository->ViewAmountOfMoneyInAccount($ViewAmountOfMoneyInAccountRequest);
    }

    public function showAccountData($id)
    {
        return $this->AccountRepository->showAccountData($id);
    }
    public function ScrollAccount($page)
    {
        return $this->AccountRepository->ScrollAccount($page);
    }
}
