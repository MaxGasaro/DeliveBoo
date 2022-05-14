<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //funzione store richimata quando il cliente compila i dati per un nuovo ordine
    public function store(Request $request){
        $data = $request->all();
        $data['date'] = Carbon::now();
        /* $data['price'] = 12.50; */

        //validazione backend dei dati inseriti
        $validator = Validator::make($data, [
            "customer_name" => 'required|max:50',
            "customer_address" => 'required|max:100',
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

            //Se la validazione passa, allora creo un nuovo oggetto Order nel DB

            $order = new Order();
            $order->fill($data);
            /* dd($order); */
            $order->save();
            
            return response()->json([
                'success' => true
            ]);

            //INSERIRE GESTIONE QUANTITA'

            //INSERIRE EVENTUALMENTE CONFERMA DELL'ORDINE TRAMITE MAIL
            
        }
    }
}
