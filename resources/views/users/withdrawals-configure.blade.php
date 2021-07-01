@extends('users.layout')

@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            {{ trans('admin.admin') }}
            	<i class="fa fa-angle-right margin-separator"></i>
            		{{ trans('misc.withdrawals') }} {{ trans('misc.configure') }}
          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

          @if (session('error'))
        			<div class="alert alert-danger btn-sm alert-fonts" role="alert">
        				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    		{{ session('error') }}
                    		</div>
                    	@endif

                    	@if (session('success'))
        			<div class="alert alert-success btn-sm alert-fonts" role="alert">
        				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    		{{ session('success') }}
                    		</div>
                    	@endif
                      @if (session('notification'))
                      <div class="alert alert-success btn-sm alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session('notification') }}
                                </div>
                      @endif
                    
                      @if (session('notify_error'))
                      <div class="alert alert-danger btn-sm alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session('notify_error') }}
                                </div>
                              @endif

        	<div class="content">

        		<div class="row">

        	<div class="box box-success">
                <div class="box-header with-border">
                  <h5>
                     Withdrwals below 100,000 can be made using mpesa, from withdrawals greater than 100,0000 request for wihdrawal from admin for a bank transfer
                    </h5>
                    <h3><i class="fa fa-mobile myicon-right"></i> Mpesa</h3>
                </div><!-- /.box-header -->   
                    <form action="">
                      @csrf
                      <div class="form-group">
                        <div class="box-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Phone number</label>
                            <div class="col-sm-10">
                              <input type="text" id="phone" name="phone" class="form-control" placeholder="0712345678">
                            </div>
                          </div>
                        </div><!-- /.box-body -->
                        <div class="form-group">
                          <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Amount</label>
                              <div class="col-sm-10">
                                <input type="text" id="amount" name="amount" class="form-control" placeholder="kes">
                              </div>
                            </div>
                          </div><!-- /.box-body -->
                      
                  <div class="box-footer">

                    <a href="{{url('dashboard/withdrawals')}}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                    <button id="b2cSimulate" class="btn btn-success pull-right"  >Withdraw</button>
                  </div><!-- /.box-footer -->
                    </form>

<hr />
<form method="post" action="{{url('requestwithdrawal')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-university myicon-right"></i> Request Bank Transfer </h3>
                </div><!-- /.box-header -->

                <div class="form-group">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-10">
                        <input type="text" id="amount" name="amount" class="form-control" placeholder="kes">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('misc.bank_details') }}</label>
                    <div class="col-sm-10">

                      <textarea name="bank"rows="5" cols="40" class="form-control" placeholder="{{ trans('misc.bank_details') }}"></textarea>
                    </div>
                  </div>
                </div><!-- /.box-body -->

                  <div class="box-footer">

                    <a href="{{url('dashboard/withdrawals')}}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                    <button type="submit" class="btn btn-success pull-right" href="{{ route('requestwithdrawal') }}">Request</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>

        		</div><!-- /.row -->

        	</div><!-- /.content -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('javascript')



<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!-- icheck -->
	<script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

	<script type="text/javascript">
  document.getElementById('b2cSimulate').addEventListener('click', (event) => {
    event.preventDefault()
    
    const requestBody = {
        amount: document.getElementById('amount').value,
        phone: document.getElementById('phone').value
    }

    axios.post('http://localhost/Fundme/Script/simulateb2c', requestBody)
    .then((response) => {
        if(response.data.ResponseDescription){
            document.getElementById('c2b_response').innerHTML = response.data.Result.ResultDesc
        } else {
            document.getElementById('c2b_response').innerHTML = response.data.errorMessage
        }
    })
    .catch((error) => {
        console.log(error);
    })
})
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });

    

	</script>
  <script>
   
  </script>


@endsection
