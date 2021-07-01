<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpesaResponses extends Controller
{
    public function validation(Request $request) {
      log::info('validation endpoint hit');
      Log::info($request->all());
    }
    public function confirmation(Request $request) {
        log::info('confirmation endpoint hit');
        Log::info($request->all());
      }
      public function stkPush(Request $request) {
        log::info('skt Push endpoint hit');
        Log::info($request->all());
        return [
          'ResultCode' => 0,
          'ResultDesc' => 'Accept Service',
          'ThirdPartyTransID' => rand(3000, 10000)
        ];
      }
      public function b2cCallback(Request $request) {
        log::info('b2c endpoint hit');
        Log::info($request->all());
        return [
          'ResultCode' => 0,
          'ResultDesc' => 'Accept Service',
          'ThirdPartyTransID' => rand(3000, 10000)
        ];
      }
}
