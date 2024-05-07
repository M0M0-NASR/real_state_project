<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Transaction;
use Srmklive\PayPal\Services\ExpressCheckout;
class PaymentController extends Controller
{
     public function Payment($id)
    {
        $Property = Property::find($id);
        $PropertyPrice = $Property->Price;
        $data = [];
        $data['items'] = [
            [
                'name' => 'Buying the Property',
                'price' => $PropertyPrice,
                'desc'  => 'Buying Property',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = $Property->id;
        $data['invoice_description'] =
        "Order {$data['invoice_id']} Invoice {$Property->PropertyType->Type_name}
        For {$Property->PropertyStatus}, Publisher:{$Property->PropertyPublisher->User_Name} ,Location :{$Property->Location},Price :{$Property->Price}EG,Bedrms :{$Property->Bedrooms}, Bathrms:{$Property->Bathrooms}, Area :{$Property->Area}
           ";
        $data['return_url'] = 'http://localhost/RealEstate%20Update/public/PaymentSuccess/'.$Property->id;
        $data['cancel_url'] = route('PC');
        $data['total'] = $PropertyPrice;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
}
    public function PaymentCancel()
    {
        return response()->json('PaymentCanceled',402);
    }
    public function PaymentSuccess(Request $request,$id)
    {
        $Property = Property::find($id);
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING']))
        {
            $transaction = new Transaction;
            $transaction->Customer_ID = session('UserId');
            $transaction->Property_ID = $id;
            $transaction->Seller_ID = $Property->Publisher_id;
            $transaction->Cash = $Property->Price;
            $TestTransaction = Transaction::where('Customer_ID',session('UserId'))->where('Property_ID',$id);
            if($TestTransaction->count() == 0){
            $transaction->save();
           if($Property->PropertyStatus == 'Buy')
           {
            return redirect('BuyPage')->with('Successful Payment','Your Payment on the Property has been done successfully');
           }
           else {return redirect('RentPage')->with('Successful Payment','Your Payment on the Property has been done successfully');}
        }
        else{
            if($Property->PropertyStatus == 'Buy')
           {
            return redirect('BuyPage')->with('Failed Payment','Your Payment is rejected because you already paid for this property');
           }
           else {return redirect('RentPage')->with('Failed Payment','Your Payment is rejected because you already paid for this property');}
        }


    }

        return response()->json('Failed Payment',402);

    }
}
