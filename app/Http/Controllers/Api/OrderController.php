<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\customerMail;
use App\Mail\restaurantMail;
use App\Http\Requests\Orders\OrderRequest;
use App\Order;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //funzione store richimata quando il cliente compila i dati per un nuovo ordine
    public function store(Request $request){
        $data = $request->all();
        
        $data['date'] = Carbon::now(); /* ->format('d-m-Y') */


        //validazione backend dei dati inseriti
        $validator = Validator::make($data, [
            "customer_name" => 'required|max:50',
            "customer_address" => 'required|max:100',
            "customer_email" => 'required|email|max:100',
            "customer_phone" => 'required|max:15',
            "comment" => 'nullable|max:255'
        ]);

        //Se la validazione non va a buon fine, prelevo gli errori e li mostrerò in front
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
                'success' => false
            ]);
        }else{
            //Se la validazione passa, allora creo un nuovo oggetto Order nel DB, e faccio la sync della tabella pivot

            $order = new Order();
            $order->fill($data);

            $order->save();
            
            $pivotData = []; //array che conterrà le informazioni da inserire nella tabella pivot

            
            $sent = false; //booleano per indicare se l'email al ristoratore è stata mandata

            foreach ($data['cart'] as $el) { 
                /* dd($el); */

                //per ogni elemento del carrello, pusho l'id del cibo, e aggiungo la colonna amount con la quantità del singolo elemento
                $pivotData[$el['food']['id']] = ['amount' => $el['quantity']];
                
                if($sent == false){ //evito che la mail venga mandata più volte
                    $sent = true;
                    Mail::to($el['food']['user']['email'])->send(new restaurantMail($order));
                }

            }

            $order->foods()->sync($pivotData);

            //mando una mail di conferma ordine anche al cliente
            Mail::to($data["customer_email"])->send(new customerMail($order));

            
            return response()->json([
                'success' => true
            ]);
            
        }
    }

    public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request,  Gateway $gateway){

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        if($result->success){
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data,401);
        }

        return 'makePayment';
    }
}
