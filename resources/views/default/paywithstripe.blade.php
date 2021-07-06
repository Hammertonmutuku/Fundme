@extends('app')
@section('title') {{trans('auth.login')}} -@endsection
    
    @section('content')
      <div class="py-5 bg-primary bg-sections">
        <div class="btn-block text-center text-white position-relative">
          <h1>Thank you for choosing to donate to {{$campaign}}</h1>
          <p>Make Donate by clicking the pay button below.</p>
        </div>
      </div><!-- container -->
    
    <div class="py-5 bg-white text-center">
    <div class="container margin-bottom-40">
    
      <div class="row">
    <!-- Col MD -->
    <div class="col-md-12">
      <div class="d-flex justify-content-center">
    
            <form action={{$action}}method="post" class="login-form ">
              <input type="hidden" name="cmd" value="_donations">
              <input type="hidden" name="return" value={{$urlSuccess}}>
              <input type="hidden" name="cancel_return"   value={{$urlCancel}}>
              <input type="hidden" name="cancel_return"   value={{$urlPaypalIPN}}>
              <!-- ***** Form Group ***** -->
              <div class="form-group">
                <label>{{ trans('auth.email') }}</label>
                <input type="email" class="form-control"   value="hammertonmutuku@business.example.com" name="business" placeholder="{{ trans('auth.email') }}" title="{{ trans('auth.email') }}" autocomplete="off">
             </div><!-- ***** Form Group ***** -->
             <!-- ***** Form Group ***** -->
             <div class="form-group">
              <label>Currency</label>
              <input type="text" class="form-control"   value="USD" name="currency_code" placeholder="USD"  autocomplete="off">
             </div><!-- ***** Form Group ***** -->
             <!-- ***** Form Group ***** -->
             <div class="form-group">
              <label>Amount</label>
              <input type="text" class="form-control"   value={{$amount}} name="amount" placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
            <!-- ***** Form Group ***** -->
            <div class="form-group">
              <label> Donate to</label>
              <input type="text" class="form-control"    value={{$campaign}} name="item_name"  placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
              <input type="image" name="submit"
                  src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
                  alt="PayPal - The safer, easier way to pay online">
            </form>
           
         </div><!-- Login Form -->
         
        
         
       </div><!-- /COL MD -->
      </div><!-- ./ -->
      </div><!-- ./ -->
    </div>
     <!-- container wrap-ui -->
    
    @endsection
    
    @section('javascript')
      <script type="text/javascript">
    
      @if (count($errors) > 0)
          scrollElement('#dangerAlert');
        @endif
    
    </script>
    @endsection
    