<?php
use App\Http\Requests\AddMoneyRequest;
use App\Http\Requests\withdrawalMoneyRequest;
use App\Http\Requests\sendMoneyRequest;
use App\Http\Requests\transactionHistoryRequest;
interface Itransaction{

    public function Addmoney( AddMoneyRequest $request):string;
    public function Withdrawmoney( withdrawalMoneyRequest $request):string;
    public function SendMoneyTo(sendMoneyRequest $request):string;
    public function TransactionHistory(transactionHistoryRequest $request):string;
    
}