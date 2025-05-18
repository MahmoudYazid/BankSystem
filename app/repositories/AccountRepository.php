<?php

namespace App\repositories;

use App\Http\Requests\OpenAccountRequest;

use App\Http\Requests\ViewAccountStatusRequest;
use App\Http\Requests\FreezeAcconutRequest;
use App\Http\Requests\ViewAmountOfMoneyInAccountRequest;
use App\Models\Account ;

use App\irepositories\IAccount;
use App\Http\Constants\AccountStatuses;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;


class AccountRepository implements IAccount
{

    public function __construct() {}



    // open account
    public function OpenAccount(OpenAccountRequest $request): string
    {
        $payload = JWTAuth::parseToken()->getPayload();
        $userId = $payload->get('user_id');
        $posts = new Account;
        $posts->userId = $userId;
        $posts->balance = 0;
        $posts->type = $request->get('type');
        $posts->status = $request->get('status');
        $posts->save();
        return response()->json([
            'data' => $posts,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);
    }



    // Delete account
    public function CloseAccount($id): string
    {

        
        
        $account = Account::find($id);



        if ($account) {
            $account->delete();
            return response()->json([
                'data' => "deleted ",
                'message' => 'Succeed',


            ], JsonResponse::HTTP_OK);
        } else {

            return response()->json([
                'data' => "not deleted ",
                'message' => 'not Succeed'

            ], JsonResponse::HTTP_OK);
        }
    }
    // view sstatus of account
    public function ViewAccountStatus(ViewAccountStatusRequest $request): string
    {

        $data = Account::where("id", $request->get('AccountId'))->first();
        return response()->json([
            "status" => $data->status

        ], JsonResponse::HTTP_OK);
    }

    public function FreezeAccount(FreezeAcconutRequest $request): string
    {
        $data = Account::where("id", $request->get('AccountId'))->first();
        if ($data) {
            $data->status = AccountStatuses::freeze;;
            $data->save();
            return Response()->json([
                "data" => $data

            ], JsonResponse::HTTP_OK);
        } else {
            return  Response()->json([
                "data" => "No change Happened"

            ], JsonResponse::HTTP_EXPECTATION_FAILED);
        }
    }
    public function unFreezeAccount(FreezeAcconutRequest $request): string
    {
        $data = Account::where("id", $request->get('AccountId'))->first();
        if ($data) {
            $data->status = AccountStatuses::active;;
            $data->save();
            return Response()->json([
                "data" => $data

            ], JsonResponse::HTTP_OK);
        } else {
            return  Response()->json([
                "data" => "No change Happened"

            ], JsonResponse::HTTP_EXPECTATION_FAILED);
        }
    }
    public function ViewAmountOfMoneyInAccount(ViewAmountOfMoneyInAccountRequest $request): string
    {
        $data = Account::where("id", $request->get('AccountId'))->first();
        return Response()->json([
            "balance" => $data->balance
        ], JsonResponse::HTTP_OK);
    }
    public function ModifyAccount($id, $newData, $WhatToModify)
    {

        $Target = Account::find($id);
        switch ($WhatToModify) {
            case 'balance':
                $Target->balance = $newData;
                $Target->save();
                return Response()->json([
                    "change" => "Modifies"
                ], JsonResponse::HTTP_OK);
                # code...
                break;
            case 'type':
                $Target->type = $newData;
                $Target->save();
                return Response()->json([
                    "change" => "Modifies"
                ], JsonResponse::HTTP_OK);
                break;
            case 'status':
                $Target->status = $newData;
                $Target->save();
                return Response()->json([
                    "change" => "Modifies"
                ], JsonResponse::HTTP_OK);
                break;
            case 'userId':
                $Target->userId = $newData;
                $Target->save();
                return Response()->json([
                    "change" => "Modifies"
                ], JsonResponse::HTTP_OK);
                break;

            default:
                return Response()->json([
                    "change" => "Failed , the newData shouk "
                ], JsonResponse::HTTP_OK);
                break;
        }
    }
    public function showAccountData($id)
    {
        return Response()->json([
            "data" => Account::find($id)
        ], JsonResponse::HTTP_OK);
    }
    public function ScrollAccount($page)
    {
        $Factor = 10;
        $max = $page * $Factor;
        $min = $max - $Factor;

        
       

            return Response()->json([
                "data" => Account::skip($min)->take($max)->get()
            ], JsonResponse::HTTP_OK);

    }
}
