<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\Campaigns;
use App\Models\Donations;
use App\Models\Withdrawals;
use App\Models\User;
use App\Models\Rewards;
use Fahim\PaypalIPN\PaypalIPNListener;
use App\Helper;
use Mail;
use Carbon\Carbon;
use App\Models\PaymentGateways;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;


class MpesaController extends Controller
{
  public function __construct( AdminSettings $settings, Request $request) {
		$this->settings = $settings::first();
		$this->request = $request;
	}

  public function show() {
  

    return $this->stkPush();

    }

 
  public function getAccessToken(){
        // Get Payment Gateway
    // $payment = PaymentGateways::findOrFail($this->request->payment_gateway);

    // Verify environment Sandbox or Live
    // if ( $payment->sandbox == 'true') {
    //   $action = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    //   } else {
    //   $action = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    //   }
    $url = env('MPESA_ENV') == 0
    ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
    : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
     
      $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
            )
        );

        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        // return $response;
        return $response->access_token;
    }
  
    public function makeHttp($url, $body)
     {
      $curl = curl_init();
      curl_setopt_array(
          $curl,
          array(
                  CURLOPT_URL => $url,
                  CURLOPT_HTTPHEADER => array('Content-Type:application/json','Authorization:Bearer '. $this->getAccessToken()),
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_POST => true,
                  CURLOPT_POSTFIELDS => json_encode($body)
              )
          );
      $curl_response = curl_exec($curl);
      curl_close($curl);
      return $curl_response;
      // return redirect()->back()
      // ->withErrors($validator)
      // ->withInput();
    }

   public function registerUrls(){
     $body = array(
        'ShortCode' => env('MPESA_SHORTCODE'),
        'ResponseType' => 'Completed',
        'ConfirmationURL' => env('MPESA_TEST_URL') . '/api/confirmation',
        'ValidationURL' => env('MPESA_TEST_URL') . '/api/validation'
     );
  
     $url = env('MPESA_ENV') == 0 
     ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
     : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
  
     $response = $this->makeHttp($url, $body);
     return $response;
   }
    
   public function stkPush()
   {   
    $timestamp = date('Ymdhis');
    $password = base64_encode(env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp);
    $num = $this->request->phone;
    $phone1 = str_replace(array(" ", ",", ".", "!", "-", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_"), "", $num);
    if (strlen($phone1) <= 12) {
      $c = substr($phone1, 0, 1);
      if (substr($phone1, 0, 3) == '254' and strlen($num) == 12) {
           $phone = $phone1;
      } elseif ((strlen($phone1) == 10 || strlen($num) == 9) and ($c == 0 or $c == 7)) {
          $phone = substr($phone1, -9);
          $phone = '254' . $phone;
           $phone;
      } else {
          $p1 = 'Invalid Phone Number ' . $phone1;
      }
  }
   
    $curl_post_data = array(
      'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
      'Password' => $password,
      'Timestamp' => $timestamp,
      'TransactionType' => 'CustomerPayBillOnline',
      'Amount' => $this->request->amount,
      'PartyA' => $phone,
      'PartyB' => env('MPESA_STK_SHORTCODE'),
      'PhoneNumber' => $phone,
      'CallBackURL' => env('MPESA_TEST_URL'). '/stkpush',
      'AccountReference' => $this->request->campaign_title,
      'TransactionDesc' =>$this->request->campaign_title,
    );
    
    // $payment = PaymentGateways::findOrFail($this->request->payment_gateway);

    // // Verify environment Sandbox or Live
    // if ( $payment->sandbox == 'true') {
    //   $action1 = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
    //   } else {
    //   $action1 = "https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
    //   }

    $url = env('MPESA_ENV') == 0
    ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
    : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
      // $response = json_decode(curl_exec($curl));
       $respo = $this->makeHttp($url, $curl_post_data);

      //  return $respo;

      // Json_decode
       $resq= json_decode($respo,TRUE);
       $resq1= json_decode($respo);

      // return $resq1->{'CheckoutRequestID'};

        // return $resq;
          if(array_key_exists("ResponseDescription", $resq))
      {
      
          // Insert DB and send Mail
      $sql                   = new Donations;
      $sql->campaigns_id     = $this->request->_id;
      $sql->txn_id           = $resq1->{'CheckoutRequestID'};
      $sql->fullname         = $this->request->full_name;
      $sql->email            = $this->request->email;
      $sql->country          = $this->request->country;
      $sql->postal_code      = $this->request->postal_code;
      $sql->donation         = $this->request->amount;
      $sql->payment_gateway  = 'Mpesa';
      $sql->comment          = $this->request->input('comment', '');
      $sql->anonymous        = $this->request->input('anonymous', '0');
      $sql->rewards_id       = $this->request->input('_pledge', 0);
      $sql->save();

       // Send Email
      $campaign = Campaigns::find($this->request->_id);

      $sender       = $this->settings->email_no_reply;
      $titleSite    = $this->settings->title;
      $_emailUser   = $this->request->email;
      $campaignID   = $campaign->id;
      $campaignTitle = $campaign->title;
      $organizerName = $campaign->user()->name;
      $organizerEmail = $campaign->user()->email;
      $fullNameUser = $this->request->full_name;
      $paymentGateway = 'Stripe';

      Mail::send('emails.thanks-donor', array(
            'data' => $campaignID,
            'fullname' => $fullNameUser,
            'title_site' => $titleSite,
            'campaign_id' => $campaignID,
            'organizer_name' => $organizerName,
            'organizer_email' => $organizerEmail,
            'payment_gateway' => $paymentGateway,
          ),
      function($message) use ( $sender, $fullNameUser, $titleSite, $_emailUser, $campaignTitle)
        {
            $message->from($sender, $titleSite)
              ->to($_emailUser, $fullNameUser)
            ->subject( trans('misc.thanks_donation').' - '.$campaignTitle.' || '.$titleSite );
        });

          // return "good";
         Session::flash('notification',trans('auth.success_Donation'));
         return redirect()->back();


      }else {
         Session::flash('notify_error','Something went wrong, check input');
         return redirect()->back();
      }
  }
   public function b2cRequest(Request $request)
   {

    $num = $this->request->phone;
    $phone1 = str_replace(array(" ", ",", ".", "!", "-", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_"), "", $num);
    if (strlen($phone1) <= 12) {
      $c = substr($phone1, 0, 1);
      if (substr($phone1, 0, 3) == '254' and strlen($num) == 12) {
           $phone = $phone1;
      } elseif ((strlen($phone1) == 10 || strlen($num) == 9) and ($c == 0 or $c == 7)) {
          $phone = substr($phone1, -9);
          $phone = '254' . $phone;
           $phone;
      } else {
          $p1 = 'Invalid Phone Number ' . $phone1;
      }
  }

  $this->validate($request,[
    'amount' => 'bail|required|integer|min:100|max:100,000',
]);

     $curl_post_data = array(
           'InitiatorName' => env('MPESA_B2C_INITIATOR'),
           'SecurityCredential' => env('MPESA_B2C_PASSWORD'),
           'CommandID' => 'SalaryPayment',
           'Amount' => $request->amount,
           'PartyA' => env('MPESA_SHORTCODE'),
           'PartyB' => $phone,
           'Remarks' => "withdrawal",
           'QueueTimeOutURL' => env('MPESA_TEST_URL') . '/mpesaLaravel/api/b2ctimeout',
           'ResultURL' => env('MPESA_TEST_URL') . '/mpesaLaravel/api/b2ccallback',
           'Occasion' => "withdrawal",
         );

       $res = $this->makeHttp('https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest', $curl_post_data);
       //return $res;

       $resq= json_decode($res,TRUE);
       $resq1= json_decode($res);
    
       if(array_key_exists("ResponseDescription", $resq))
       {

          // Insert into db.

        $campaign = Campaigns::find($this->request->_id);

        $sql                   = new Withdrawals;
        $sql->campaigns_id     = $this->request->_id;
        $sql->txn_id           = $resq1->{'OriginatorConversationID'};
        $sql->amount         = $this->request->amount;
        $sql->gateway  = 'Mpesa';
        $sql->date          = date('Y-m-d H:i:s');
        $sql->account        = $phone;
        $sql->date_paid       = date('Y-m-d H:i:s');
        $sql->save();

          // Send Email
      
          $sender       = auth()->user()->email;
          $titleSite    = $this->settings->title;
          $_emailUser   = auth()->user()->email;
          $fullNameUser = auth()->user()->name;
          $amount = $this->request->amount;
      
          
          Mail::send('emails.withdrawal-processed', array(
            'fullname' => $fullNameUser,
            'title_site' => $titleSite,
            'amount' => $amount,
            
          ),
      function($message) use ( $sender, $fullNameUser, $titleSite, $_emailUser)
        {
            $message->from($sender, $titleSite)
              ->to($_emailUser, $fullNameUser)
            ->subject( 'Withdrawal' );
        });
     


         return "good";
        // Session::flash('notification',trans('auth.success_Donation'));
        // return redirect()->back();

       }else {
         return "bad";
        // Session::flash('notify_error','Something went wrong, check input');
        // return redirect()->back();

       }
   
  }

  public function requestWithdrawal() {
            $sender       = auth()->user()->email;
            $titleSite    = $this->settings->title;
            $_emailUser   = auth()->user()->email;
            $fullNameUser = auth()->user()->name;
            $amount = $this->request->amount;

            
            Mail::send('emails.request-withdrawal', array(
              'fullname' => $fullNameUser,
              'title_site' => $titleSite,
              'amount' => $amount,
              
            ),
          function($message) use ( $sender, $fullNameUser, $titleSite, $_emailUser)
          {
              $message->from($sender, $titleSite)
                ->to($_emailUser, $fullNameUser)
              ->subject( 'Request for withdrawal');
          });


      return "good";



  }
  
 
}
