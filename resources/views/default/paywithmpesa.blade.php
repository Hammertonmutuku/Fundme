@extends('app')
@section('title') {{trans('auth.login')}} -@endsection
    
    @section('content')
      <div class="py-5 bg-primary bg-sections">
        <div class="btn-block text-center text-white position-relative">
          <h1>Thank you for choosing to donate to {{$account}}</h1>
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
                <div id="c2b_response"></div>
              <!-- ***** Form Group ***** -->
              <div class="form-group">
                <label>Phone number</label>
                <input type="tel" class="form-control"   value={{$phone}} name="phone" id="phone" placeholder="+25471234567" autocomplete="off">
             </div><!-- ***** Form Group ***** -->
             <!-- ***** Form Group ***** -->
             <div class="form-group">
              <label>Amount</label>
              <input type="text" class="form-control"   value={{$amount}} name="amount" id="amount" placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
            <!-- ***** Form Group ***** -->
            <div class="form-group">
              <label> Donate to</label>
              <input type="text" class="form-control"    value={{$account}} name="item_name" id="account"  placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
            <button id="stkpush" class="btn btn-block mt-2 py-2 btn-primary font-weight-ligh">Donate</button>
            </form>
           
         </div><!-- Login Form -->
         
        
         
       </div><!-- /COL MD -->
      </div><!-- ./ -->
      </div><!-- ./ -->
    </div>
     <!-- container wrap-ui -->
    
    @endsection
    
    @section('javascript')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <script type="text/javascript">
     
    
      @if (count($errors) > 0)
          scrollElement('#dangerAlert');
        @endif

  
 document.getElementById('stkpush').addEventListener('click', (event) => {
    event.preventDefault()
    
    const requestBody = {
        amount: document.getElementById('amount').value,
        account: document.getElementById('account').value,
        phone: document.getElementById('phone').value
    }

    axios.post('http://localhost/Fundme/Script/stkpush', requestBody)
    .then((response) => {
        if(response.data.ResponseDescription){
            document.getElementById('c2b_response').innerHTML = response.data.ResponseDescription
        } else {
            document.getElementById('c2b_response').innerHTML = response.data.errorMessage
        }
    })
    .catch((error) => {
        console.log(error);
    })
})
    
    </script>
    @endsection
    