<?php
use App\Http\Requests\AddMoneyRequest;
use App\Http\Requests\withdrawalMoneyRequest;
use App\Http\Requests\sendMoneyRequest;
use App\Http\Requests\transactionHistoryRequest;
use App\Models\Account;
use App\Models\transactions;
use App\Models\user;

class TransactionRepository implements ITransaction{
    public Account $AccountModel_;
    public user $userModel_; 
    public transactions $transactionsModel_; 
    public function __construct(Account $AccountModelInstant,user $userModelInstant, transactions $transactionsModelInstant ) {
        $this->AccountModel_ = $AccountModelInstant;
        $this->userModel_ = $userModelInstant;
        $this->transactionsModel_ = $transactionsModelInstant;
    }
    
    public function Addmoney( AddMoneyRequest $request):string{
        return "";

    }
    public function Withdrawmoney( withdrawalMoneyRequest $request):string{

        return "";
    }
    public function SendMoneyTo(sendMoneyRequest $request):string{
        return "";
    }
    public function TransactionHistory(transactionHistoryRequest $request):string{

        return "";
    }


}