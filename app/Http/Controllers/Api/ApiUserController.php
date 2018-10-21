<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Resources\UserResource;
use App\User;
use GuzzleHttp\Client;

//API user controller
class ApiUserController extends Controller
{

    /*    public function retrieve(Request $request)
        {
    //        return new UserResource(User::find($request->user()->id));
    //        return $request->user();
        }

        public function credits(Request $request) {
            return $request->user()->credit;
        }*/

    public function recieveAuthorization(Request $request)
    {
        $code = $request->code; //authorization code
//        return $code;
        $client = new Client();
        $response = $client->request('POST', 'https://api-uat.unionbankph.com/partners/sb/convergent/v1/oauth2/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '684d855d-e843-4746-9d0d-3860f183b0ea',
                'code' => $code,
            ]
        ]);

        $contents = $response->getBody()->getContents();
        $cont_arr = json_decode($contents, true);
        $access_token = $cont_arr['access_token'];
        $this->makePayment($access_token);

        /*'client_id' => '684d855d-e843-4746-9d0d-3860f183b0ea',
                'code' => $request->code,*/
//        dd($response);
    }

    public function makePayment($access_token)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api-uat.unionbankph.com/partners/sb/merchants/v1/payments/single', [
            'headers' => [
                'Content-Type' => 'application/json',
                'x-ibm-client-id' => '684d855d-e843-4746-9d0d-3860f183b0ea',
                'x-ibm-client-secret' => 'xC8kC2rV4qP7sD7eQ3hX7vI3rH2hD6jM0nQ7fH7eH7iY3qH8eA',
                'Authorization' => "Bearer $access_token",
                'x-merchant-id' => 'a99e2818-1ebf-4d62-8671-9b9cb819055e'
            ],
            'json' => [
                "senderPaymentId" => "00001",
                "paymentRequestDate" => "2019-08-07T12:09:23.555",
                "amount" => [
                    "currency" => "PHP",
                    "value" => "100",
                ],
                "remarks" => "Payment remarks",
                "particulars" => "Payment particulars",
                "info" => [
                    [
                        "index" => 1,
                        "name" => "Payor",
                        "value" => "Juan Dela Cruz"
                    ],
                    [
                        "index" => 2,
                        "name" => "InvoiceNo",
                        "value" => "12345"
                    ]
                ]

            ]
        ]);

//        dd($response->getBody()->getContents());
        return redirect(route('payment.success'));
    }

}
