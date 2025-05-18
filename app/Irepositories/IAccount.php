<?php
namespace App\irepositories;

use App\Http\Requests\OpenAccountRequest;
use App\Http\Requests\CloseAccountRequest;
use App\Http\Requests\ViewAccountStatusRequest;
use App\Http\Requests\ViewAmountOfMoneyInAccountRequest;
use App\Http\Requests\FreezeAcconutRequest;
interface IAccount{
    public function OpenAccount(OpenAccountRequest $request):string;
    public function CloseAccount($id):string;

    public function ViewAccountStatus(ViewAccountStatusRequest $request):string;
    public function FreezeAccount(FreezeAcconutRequest $request):string;
    public function unFreezeAccount(FreezeAcconutRequest $request):string;

    public function ViewAmountOfMoneyInAccount(ViewAmountOfMoneyInAccountRequest $request ):string;
    public function ModifyAccount($id,$newData,$WhatToModify);
    public function showAccountData($id);
    public function ScrollAccount($page);


}