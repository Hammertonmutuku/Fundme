<?php $__env->startSection('title'); ?><?php echo e(trans('misc.donate_to').' '.$response->title.' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 11px 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  margin-bottom: 10px
}

.StripeElement--focus {
	border-color: #f45302;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="jumbotron mb-0 bg-sections text-center" style="background-image: url('<?php echo e(url('public/campaigns/large', $response->large_image), false); ?>')">
      <div class="container wrap-jumbotron position-relative">
      	<h1 class="text-break"><?php echo e(trans('misc.donate_to'), false); ?> <?php echo e($response->title, false); ?></h1>
      	<p class="mb-0"><?php echo e(trans('misc.donate_to_subtitle'), false); ?></p>
      </div>
    </div>

<!-- Container
============================= -->
<div class="container py-5">

  <div class="row">

 <div class="wrap-container-lg">

 <!-- Col MD -->
 <div class="col-md-12">

   <?php if( isset($pledge) ): ?>
     <div class="card mb-3" style="position: initial;">
       <div class="card-body">

         <h6 class="card-title" style="line-height: inherit;">
           <i class="fa fa-gift"></i> <?php echo e(trans('misc.seleted_pledge'), false); ?> <small><a href="<?php echo e(url('donate',$response->id), false); ?>"><?php echo e(trans('misc.remove'), false); ?></a></small>
         </h6>

         <hr />

         <h5 class="card-title">
           <small><?php echo e(trans('misc.pledge'), false); ?></small> <strong class="font-default"><?php echo e(App\Helper::amountFormat($pledge->amount), false); ?></strong>
       </h5>
         <h6 class="card-subtitle mb-2 text-muted"><?php echo e($pledge->title, false); ?></h6>
         <p class="card-text"><?php echo e($pledge->description, false); ?></p>

         <small class="btn-block text-muted">
           <i class="far fa-clock"></i> <?php echo e(trans('misc.delivery'), false); ?>:
         </small>
         <strong><?php echo e(date('F, Y', strtotime($pledge->delivery)), false); ?></strong>
       </div>
     </div>

 	 <div class="panel panel-default d-none">
   		<div class="panel-body">
 				<h3 class="btn-block margin-zero" style="line-height: inherit;">
 					<?php echo e(trans('misc.seleted_pledge'), false); ?> <small><a href="<?php echo e(url('donate',$response->id), false); ?>"><?php echo e(trans('misc.remove'), false); ?></a></small>
 				</h3>
  			<h3 class="btn-block margin-zero" style="line-height: inherit;">
  				<small><?php echo e(trans('misc.pledge'), false); ?></small>
  				<strong class="font-default"><?php echo e(App\Helper::amountFormat($pledge->amount), false); ?></strong>
  				</h3>
 				<h4><?php echo e($pledge->title, false); ?></h4>
  				<p class="wordBreak">
  					<?php echo e($pledge->description, false); ?>

  				</p>

 				<small class="btn-block text-muted">
 					<?php echo e(trans('misc.delivery'), false); ?>:
 				</small>
 				<strong><?php echo e(date('F, Y', strtotime($pledge->delivery)), false); ?></strong>
  		</div><!-- panel-body -->
  	</div><!-- End Panel -->
 <?php endif; ?>

   <!-- Start Panel -->
    	<div class="panel panel-default panel-transparent mb-4">
   	  <div class="panel-body">
   	    <div class="media none-overflow">
   			  <div class="d-flex my-2 align-items-center">
   			      <img class="rounded-circle mr-2" src="<?php echo e(url('public/avatar',$response->user()->avatar), false); ?>" width="60" height="60">

   						<div class="d-block">
                <small class="d-block"><?php echo e(trans('misc.organizer'), false); ?></small>
   						<?php echo e(trans('misc.by'), false); ?> <strong class="text-dark"><?php echo e($response->user()->name, false); ?></strong>

   						<?php if(Auth::guest() || Auth::check() && Auth::user()->id != $response->user()->id): ?>
   			    		<a href="#" title="<?php echo e(trans('misc.contact_organizer'), false); ?>" class="text-muted" data-toggle="modal" data-target="#sendEmail">
   			    				<i class="fa fa-envelope"></i>
   			    		</a>
   						<?php endif; ?>

   							<div class="d-block">
   								<small class="media-heading text-muted btn-block margin-zero"><?php echo e(trans('misc.created'), false); ?> <?php echo e(date($settings->date_format, strtotime($response->date) ), false); ?> <span class="align-middle mx-1" style="font-size:8px;">|</span>
   								<?php if( $response->location != '' ): ?>
   							 <i class="fa fa-map-marker-alt mr-1"></i> <?php echo e($response->location, false); ?>

   							 <?php endif; ?>
   							 </small>
   							</div>
   						</div>
   			  </div>
   			</div>
   	  </div>
   	</div><!-- End Panel -->

    <?php echo $__env->make('includes.contact_organizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <span class="progress progress-xs mb-3">
  		<span class="percentage bg-success" style="width: <?php echo e($percentage, false); ?>%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
  	</span>

  	<small class="btn-block mb-4 text-muted">
  		<strong class="text-strong-small"><?php echo e(App\Helper::amountFormat($response->donations()->sum('donation')), false); ?></strong> <?php echo e(trans('misc.raised_of'), false); ?> <?php echo e(App\Helper::amountFormat($response->goal), false); ?> <?php echo e(strtolower(trans('misc.goal')), false); ?>

  		<strong class="text-percentage"><?php echo e($percentage, false); ?>%</strong>
  	</small>

    <hr>
    <div class= "row">
      <div class = "col">
    <img src="<?php echo e(asset('public/payments/mpesa.png'), false); ?>"  width="225" height="125" />
      </div>
      <div class = "col">
        <a href="<?php echo e(route('payment'), false); ?>"><img src="<?php echo e(asset('public/payments/paypal2.png'), false); ?>"  width="225" height="125" id= "paypal-button"/></a>
          </div>
    </div>
  <!-- form start -->
 <form method="POST" action="<?php echo e(url('donate', $response->id), false); ?>" enctype="multipart/form-data" id="formDonation">

   <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
   <input type="hidden" name="_id" value="<?php echo e($response->id, false); ?>">
   <?php if(isset($pledge)): ?>
     <input id="_pledge" type="hidden" name="_pledge" value="<?php echo e($pledge->id, false); ?>">
   <?php endif; ?>

   <?php if($settings->captcha_on_donations == 'on'): ?>
     <?php echo app('captcha')->renderCaptcha(); ?>
   <?php endif; ?>

   <div class="form-group">
         <label><?php echo e(trans('misc.enter_your_donation'), false); ?></label>
         <div class="input-group has-success">
           <div class="input-group-prepend">
             <span class="input-group-text"><?php echo e($settings->currency_symbol, false); ?></span>
           </div>
           <input type="number" min="<?php echo e($settings->min_donation_amount, false); ?>"  autocomplete="off" id="onlyNumber" class="form-control form-control-lg" name="amount" <?php if( isset($pledge) ): ?>readonly='readonly'<?php endif; ?> value="<?php if( isset($pledge) ): ?><?php echo e($pledge->amount, false); ?><?php endif; ?>" placeholder="<?php echo e(trans('misc.minimum_amount'), false); ?> <?php if($settings->currency_position == 'left'): ?> <?php echo e($settings->currency_symbol.$settings->min_donation_amount, false); ?> <?php else: ?> <?php echo e($settings->min_donation_amount.$settings->currency_symbol, false); ?> <?php endif; ?> <?php echo e($settings->currency_code, false); ?>">
         </div>
       </div>

      <!-- Start -->
         <div class="form-row form-group">
           <!-- Start -->
           <div class="col">
           <label><?php echo e(trans('auth.full_name'), false); ?></label>
             <input type="text" id="cardholder-name" value="<?php if( Auth::check() ): ?><?php echo e(Auth::user()->name, false); ?><?php endif; ?>" name="full_name" class="form-control input-lg" placeholder="<?php echo e(trans('misc.first_name_and_last_name'), false); ?>">
           </div><!-- /. End-->

           <!-- Start -->
           <div class="col">
             <label><?php echo e(trans('auth.email'), false); ?></label>
               <input type="text" id="cardholder-email" value="<?php if( Auth::check() ): ?><?php echo e(Auth::user()->email, false); ?><?php endif; ?>" name="email" class="form-control input-lg" placeholder="<?php echo e(trans('auth.email'), false); ?>">
           </div><!-- /. End-->

         </div><!-- /. form-row-->

           <div class="form-row form-group">
               <!-- Start -->
               
                 <div class="col">
                   <label><?php echo e(trans('misc.country'), false); ?></label>
                     <select id="country" name="country" class="custom-select" >
                       <option value=""><?php echo e(trans('misc.select_one'), false); ?></option>
                     <?php $__currentLoopData = App\Models\Countries::orderBy('country_name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option <?php if( Auth::check() && Auth::user()->countries_id == $country->id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($country->country_name, false); ?>"><?php echo e($country->country_name, false); ?></option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                     </div><!-- /. End-->

               <!-- Start -->
                 <div class="col">
                   <label><?php echo e(trans('misc.postal_code'), false); ?></label>
                     <input type="text" id="postal_code" value="<?php echo e(old('postal_code'), false); ?>" name="postal_code" class="form-control" placeholder="<?php echo e(trans('misc.postal_code'), false); ?>">
                 </div><!-- /. End-->

               </div><!-- form-row -->

               <!-- Start -->
                 <div class="form-group">
                     <input type="text" id="comment" value="<?php echo e(old('comment'), false); ?>" name="comment" class="form-control input-lg" placeholder="<?php echo e(trans('misc.leave_comment'), false); ?>">
                 </div><!-- /. End-->

                 <!-- Start -->
                   <div class="form-group">
                     <label><?php echo e(trans('misc.payment_gateway'), false); ?></label>
                         <?php $__currentLoopData = PaymentGateways::where('enabled', '1')->orderBy('type')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                         <?php

                           if($payment->type == 'card' ) {

                             $paymentName = '<i class="far fa-credit-card mr-1"></i> '. trans('misc.debit_credit_card') . ' ('.$payment->name.')';
                           } elseif ($payment->type == 'bank') {
                             $paymentName = '<i class="fa fa-university mr-1"></i> '.trans('misc.bank_transfer');
                           } else {
                             $paymentName = '<i class="fa fa-wallet mr-1"></i> '.trans('misc.pay_through').' '.$payment->name;
                           }

                          ?>

                         <div class="custom-control custom-radio mb-2">
                          <input <?php if(PaymentGateways::where('enabled', '1')->count() == 1): ?> checked <?php endif; ?> type="radio" id="payment_gateway<?php echo e($payment->id, false); ?>" name="payment_gateway" value="<?php echo e($payment->id, false); ?>" class="custom-control-input paymentGateway">
                          <label class="custom-control-label" for="payment_gateway<?php echo e($payment->id, false); ?>"><?php echo $paymentName; ?></label>
                        </div>

                        <?php if($_bankTransfer): ?>

                          <?php if($payment->id == 3): ?>

                            <div class="btn-block <?php if(PaymentGateways::where('enabled', '1')->count() != 1): ?> d-none-custom <?php endif; ?>" id="bankTransferBox">
                              <div class="alert alert-info">
                              <h5 class="font-weight-bold"><i class="fa fa-university"></i> <?php echo e(trans('misc.make_payment_bank'), false); ?></h5>
                              <ul class="list-unstyled">
                                  <li>
                                    <?php echo nl2br($_bankTransfer->bank_info); ?>

                                  </li>
                              </ul>
                            </div>

                            <div class="row form-group">
                            <!-- Start -->
                              <div class="col-sm-12">
                                <label><?php echo e(trans('admin.bank_transfer_details'), false); ?></label>
                                  <textarea name="bank_transfer" rows="4" class="form-control input-lg" placeholder="<?php echo e(trans('admin.bank_transfer_info'), false); ?>"></textarea>
                            </div><!-- /. End-->
                            </div><!-- row form-control -->
                            </div><!-- Alert -->
                          <?php endif; ?>
                        <?php endif; ?>

                        <?php if($payment->id == 2): ?>
                        <div id="stripeContainer" class="<?php if(PaymentGateways::where('enabled', '1')->count() != 1): ?> d-none-custom <?php endif; ?>">
                          <div id="card-element" class="margin-bottom-10">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>
                          <!-- Used to display form errors. -->
                          <div id="card-errors" class="alert alert-danger d-none-custom" role="alert"></div>
                        </div>
                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   </div><!-- /. End-->

     <div class="form-group custom-control custom-checkbox">
       <input class="custom-control-input" id="customControlInline" name="anonymous" type="checkbox" value="1">
       <label class="custom-control-label" for="customControlInline"><?php echo e(trans('misc.anonymous_donation'), false); ?></label>
     </div>

    <!-- Alert -->
   <div class="alert alert-danger d-none-custom" id="errorDonation">
     <ul class="list-unstyled m-0" id="showErrorsDonation"></ul>
   </div><!-- Alert -->

         <div class="box-footer text-center">
           <?php if($settings->captcha_on_donations == 'on'): ?>
             <p class="help-block">
               <em><?php echo e(trans('misc.user_captcha'), false); ?> <?php if($settings->registration_active == 'on'): ?>- <a href="<?php echo e(url('register'), false); ?>"><?php echo e(trans('auth.sign_up'), false); ?></a><?php endif; ?> - <a href="<?php echo e(url('login'), false); ?>"><?php echo e(trans('auth.login'), false); ?></a></em>
                 <small class="btn-block text-center"><?php echo e(trans('misc.protected_recaptcha'), false); ?> <a href="https://policies.google.com/privacy" target="_blank"><?php echo e(trans('misc.privacy'), false); ?></a> - <a href="https://policies.google.com/terms" target="_blank"><?php echo e(trans('misc.terms'), false); ?></a></small>
             </p>
           <?php endif; ?>

           <hr />

           <button type="submit" id="buttonDonation" class="btn btn-lg btn-primary w-100 no-hover mb-2"><i></i> <?php echo e(trans('misc.donate'), false); ?></button>
           <div class="btn-block text-center margin-top-20">
           <a href="<?php echo e(url('campaign',$response->id), false); ?>" class="text-muted">
           <i class="fa fa-long-arrow-alt-left"></i>	<?php echo e(trans('auth.back'), false); ?></a>
        </div>
         </div><!-- /.box-footer -->
       </form>

</div><!-- /COL MD -->
</div><!-- wrap-container-lg -->

</div><!-- Row -->

 </div><!-- container wrap-ui -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src='https://js.paystack.co/v1/inline.js'></script>

<script type="text/javascript">

$(document).ready(function() {

	$("#onlyNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

$('.paymentGateway').on('change', function(){

    if($(this).val() == '3') {
			$('#bankTransferBox').slideDown();
		} else {
				$('#bankTransferBox').slideUp();
		}

		if($(this).val() == '2') {
			$('#stripeContainer').slideDown();
		} else {
			$('#stripeContainer').slideUp();
		}

});


<?php if(isset($_stripe->key)): ?>
// Create a Stripe client.
var stripe = Stripe('<?php echo e($_stripe->key, false); ?>');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var cardElement = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
cardElement.mount('#card-element');

// Handle real-time validation errors from the card Element.
cardElement.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  var payment = $('input[name=payment_gateway]:checked').val();

  if(payment == 2) {
    if (event.error) {
  		displayError.classList.remove('d-none-custom');
      displayError.textContent = event.error.message;
      $('#buttonDonation').removeAttr('disabled');
      $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');
    } else {
  		displayError.classList.add('d-none-custom');
      displayError.textContent = '';
    }
  }

});

var cardholderName = document.getElementById('cardholder-name');
var cardholderEmail = document.getElementById('cardholder-email');
var cardButton = document.getElementById('buttonDonation');

function chargeDonation() {

	//ev.preventDefault();

  var payment = $('input[name=payment_gateway]:checked').val();

  if(payment == 2) {

  stripe.createPaymentMethod('card', cardElement, {
    billing_details: {name: cardholderName.value, email: cardholderEmail.value}
  }).then(function(result) {
    if (result.error) {

      if(result.error.type == 'invalid_request_error') {

          if(result.error.code == 'parameter_invalid_empty') {
            $('.popout').addClass('popout-error').html('<?php echo e(trans('admin.card_required_name_email'), false); ?>').fadeIn('500').delay('5000').fadeOut('500');
          } else {
            $('.popout').addClass('popout-error').html(result.error.message).fadeIn('500').delay('5000').fadeOut('500');
          }
      }
      $('#buttonDonation').removeAttr('disabled');
      $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');

    } else {

      $('#buttonDonation').attr({'disabled' : 'true'});
      $('#buttonDonation').find('i').addClass('spinner-border spinner-border-sm align-baseline mr-1');

      // Otherwise send paymentMethod.id to your server
      $('input[name=payment_method_id]').remove();

			var $input = $('<input id=payment_method_id type=hidden name=payment_method_id />').val(result.paymentMethod.id);
			$('#formDonation').append($input);

			$.ajax({
 		 	headers: {
         	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     		},
 		   type: "POST",
			 dataType: 'json',
 		   url:"<?php echo e(url('payment/stripe/charge'), false); ?>",
 		   data: $('#formDonation').serialize(),
 		   success: function(result) {
           handleServerResponse(result);

           if(result.success == false) {
             $('#buttonDonation').removeAttr('disabled');
             $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');
           }
 		 }//<-- RESULT
 	   })

    }//ELSE
  });
}//PAYMENT STRIPE
}

function handleServerResponse(response) {
  if (response.error) {
    $('.popout').addClass('popout-error').html(response.error).fadeIn('500').delay('5000').fadeOut('500');
    $('#buttonDonation').removeAttr('disabled');
    $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');

  } else if (response.requires_action) {
    // Use Stripe.js to handle required card action
    stripe.handleCardAction(
      response.payment_intent_client_secret
    ).then(function(result) {
      if (result.error) {
        $('.popout').addClass('popout-error').html('<?php echo e(trans('misc.error_payment_stripe_3d'), false); ?>').fadeIn('500').delay('10000').fadeOut('500');
        $('#buttonDonation').removeAttr('disabled');
        $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');

      } else {
        // The card action has been handled
        // The PaymentIntent can be confirmed again on the server

				var $input = $('<input type=hidden name=payment_intent_id />').val(result.paymentIntent.id);
				$('#formDonation').append($input);

        $('input[name=payment_method_id]').remove();

				$.ajax({
	 		 	headers: {
	         	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	     		},
	 		   type: "POST",
				 dataType: 'json',
	 		   url:"<?php echo e(url('payment/stripe/charge'), false); ?>",
	 		   data: $('#formDonation').serialize(),
	 		   success: function(result){

					 if(result.success) {
             $('#buttonDonation').attr({'disabled' : 'true'});
             $('#buttonDonation').find('i').addClass('spinner-border spinner-border-sm align-baseline mr-1');
             $url = '<?php echo e(url('paypal/donation/success', $response->id), false); ?>';
         		  window.location.href = $url;
					 } else {
						 $('.popout').addClass('popout-error').html(result.error).fadeIn('500').delay('5000').fadeOut('500');
             $('#buttonDonation').removeAttr('disabled');
             $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');
					 }
	 		 }//<-- RESULT
	 	   })
      }// ELSE
    });
  } else {
    // Show success message
    if(response.success) {
      $('#buttonDonation').attr({'disabled' : 'true'});
      $('#buttonDonation').find('i').addClass('spinner-border spinner-border-sm align-baseline mr-1');
      $url = '<?php echo e(url('paypal/donation/success', $response->id), false); ?>';
  		window.location.href = $url;
    }

  }
}
<?php endif; ?>

//<---------------- Donate ----------->>>>
<?php if($settings->captcha_on_donations == 'on'): ?>
_submitEvent = function() {
  sendDonation();

<?php if(isset($_stripe->key)): ?>
  chargeDonation();
  <?php endif; ?>

};
  <?php else: ?>
  $(document).on('click','#buttonDonation', function(s) {
    s.preventDefault();
    sendDonation();

    <?php if(isset($_stripe->key)): ?>
      chargeDonation();
      <?php endif; ?>

    });//<<<-------- * END FUNCTION CLICK * ---->>>>
<?php endif; ?>


function sendDonation() {

  var element = $(this);
  var payment = $('input[name=payment_gateway]:checked').val();
  $('#buttonDonation').attr({'disabled' : 'true'});
  $('#buttonDonation').find('i').addClass('spinner-border spinner-border-sm align-baseline mr-1');

  $.ajax({
        type: "POST",
        dataType: 'json',
        url:"<?php echo e(url('donate', $response->id), false); ?>",
        data: $('#formDonation').serialize(),
        success: function(result) {
            // success
            if(result.success == true && result.insertBody) {

              $('#bodyContainer').html('');

             $(result.insertBody).appendTo("#bodyContainer");

             if (payment != 1 && payment != 2) {
               $('#buttonDonation').removeAttr('disabled');
               $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');
             }

              //element.removeAttr('disabled');
              $('#errorDonation').fadeOut();

            } else if(result.success == true && result.url) {
              window.location.href = result.url;
            } else {

              var error = '';

              for($key in result.errors) {
                error += '<li><i class="far fa-times-circle mr-2"></i> ' + result.errors[$key] + '</li>';
              }

              $('#showErrorsDonation').html(error);
              $('#errorDonation').fadeIn(500);
              $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');
              $('#buttonDonation').removeAttr('disabled');

            }
        },
        error: function(responseText, statusText, xhr, $form) {
            // error
            $('#buttonDonation').removeAttr('disabled');
            $('#buttonDonation').find('i').removeClass('spinner-border spinner-border-sm align-baseline mr-1');
            $('.popout').addClass('popout-error').html('Error ('+xhr+')').fadeIn('500').delay('5000').fadeOut('500');
        }
    });
}
//<---------------- End Donate ----------->>>>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/default/donate.blade.php ENDPATH**/ ?>