<div class="modal fade" id="sendEmail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modalContactOrganizer">
          <div class="modal-content">
            <div class="modal-header headerModal headerModalOverlay position-relative" style="background-image: url('<?php echo e(url('public/campaigns/large',$response->large_image), false); ?>'); background-size: cover;">

            <h5 class="modal-title text-center text-white position-relative btn-block" id="myModalLabel">

              <span class="btn-block margin-bottom-15 text-center position-relative">
                  <img class="rounded-circle" src="<?php echo e(url('public/avatar/',$response->user()->avatar), false); ?>" width="80" height="80" >
                </span>
                  <?php echo e($response->user()->name, false); ?>

                  <small class="btn-block m-0"><?php echo e(trans('misc.contact_organizer'), false); ?></small>
                  </h5>

                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
             </div><!-- Modal header -->

        <div class="modal-body listWrap text-center center-block modalForm">

            <!-- form start -->
          <form method="POST" class="margin-bottom-15" action="<?php echo e(url('contact/organizer'), false); ?>" enctype="multipart/form-data" id="formContactOrganizer">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
            <input type="hidden" name="id" value="<?php echo e($response->user()->id, false); ?>">

            <!-- Start Form Group -->
                    <div class="form-group">
                      <input type="text" required="" name="name" class="form-control" placeholder="<?php echo e(trans('users.name'), false); ?>">
                    </div><!-- /.form-group-->

                    <!-- Start Form Group -->
                    <div class="form-group">
                      <input type="text" required="" name="email" class="form-control" placeholder="<?php echo e(trans('auth.email'), false); ?>">
                    </div><!-- /.form-group-->

                    <!-- Start Form Group -->
                    <div class="form-group">
                      <textarea name="message" rows="4" class="form-control" placeholder="<?php echo e(trans('misc.message'), false); ?>"></textarea>
                    </div><!-- /.form-group-->

                    <!-- Alert -->
                    <div class="alert alert-danger d-none-custom" id="dangerAlert">
              <ul class="list-unstyled text-left" id="showErrors"></ul>
            </div><!-- Alert -->

              <button type="submit" class="btn btn-sm btn-primary px-4 py-2 custom-rounded" id="buttonFormSubmitContact">
                <i></i>
                <?php echo e(trans('misc.send_message'), false); ?>

              </button>
             </form>

             <!-- Alert -->
             <div class="alert alert-success d-none-custom" id="successAlert">
              <ul class="list-unstyled" id="showSuccess"></ul>
            </div><!-- Alert -->

              </div><!-- Modal body -->
            </div><!-- Modal content -->
          </div><!-- Modal dialog -->
        </div><!-- Modal -->
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/includes/contact_organizer.blade.php ENDPATH**/ ?>