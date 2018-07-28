
<?php $__env->startSection('pageheadcontent'); ?>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/toastr.min.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagebodycontent'); ?>

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Add Free Subscription Time
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript">Account Settings</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Add Free Time</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">
                <?php if(Session::has('fail')): ?>
                    <br>
                    <div class="alert alert-danger "><?php echo e(Session::get('fail')); ?>

                        <button class="close"
                                data-close="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if(Session::has('success')): ?>
                    <br>
                    <div class="alert alert-success "><?php echo e(Session::get('success')); ?>

                        <button class="close"
                                data-close="alert"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <br>
                <div class="portlet box grey-cascade">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Add Time
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form action="/add/free/subscription" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Add Username</label>
                                        <input type="text" name="username"
                                               value="<?php echo e(old('username')); ?>"
                                               class="form-control"/>
                                        <span class="error"
                                              style="color:red"><?php echo e($errors->first('username')); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Package Type</label>
                                        <select name="package" class="form-control valid" aria-invalid="false">
                                            <option value="">
                                                Choose package
                                            </option>
                                            <option value="1" <?php if(old('package')==1): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                Business Account
                                            </option>
                                            <option value="2" <?php if(old('package')==2): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                Private Account
                                            </option>
                                        </select>
                                        <span class="error"
                                              style="color:red"><?php echo e($errors->first('package')); ?></span>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Choose Days</label>
                                        <select name="days" class="form-control valid" aria-invalid="false">
                                            <option value="">
                                               select days
                                            </option>
                                            <option value="1" <?php if(old('days')==1): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                7 days
                                            </option>
                                            <option value="2" <?php if(old('days')==2): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                14 days
                                            </option>
                                            <option value="3" <?php if(old('days')==3): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                21 days
                                            </option>
                                            <option value="4" <?php if(old('days')==4): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                28 days
                                            </option>
                                        </select>
                                        <span class="error"
                                              style="color:red"><?php echo e($errors->first('days')); ?></span>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Choose Months</label>
                                        <select name="months" class="form-control valid" aria-invalid="false">
                                            <option value="">
                                                select months
                                            </option>
                                            <option value="1" <?php if(old('months')==1): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                1 month
                                            </option>
                                            <option value="2" <?php if(old('months')==2): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                3 months
                                            </option>
                                            <option value="3" <?php if(old('months')==3): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                6 months
                                            </option>
                                            <option value="4" <?php if(old('months')==4): ?><?php echo e('selected'); ?><?php endif; ?>>
                                                12 months
                                            </option>
                                        </select>
                                        <span class="error"
                                              style="color:red"><?php echo e($errors->first('months')); ?></span>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="margin-top-10">
                                        <button type="submit" class="btn green-haze">
                                            <i class="fa fa-check"> </i> Add Time
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

        </div>

        <div class="row">
            <?php /*<div class="col-md-12">*/ ?>
                <?php /*<!-- BEGIN VALIDATION STATES-->*/ ?>
                <?php /*<div class="portlet box yellow">*/ ?>
                    <?php /*<div class="portlet-title">*/ ?>
                        <?php /*<div class="caption">*/ ?>
                            <?php /*<i class="fa fa-gift"></i>Validation Using Icons*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="tools">*/ ?>
                            <?php /*<a href="javascript:;" class="collapse">*/ ?>
                            <?php /*</a>*/ ?>
                            <?php /*<a href="#portlet-config" data-toggle="modal" class="config">*/ ?>
                            <?php /*</a>*/ ?>
                            <?php /*<a href="javascript:;" class="reload">*/ ?>
                            <?php /*</a>*/ ?>
                            <?php /*<a href="javascript:;" class="remove">*/ ?>
                            <?php /*</a>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</div>*/ ?>
                    <?php /*<div class="portlet-body form">*/ ?>
                        <?php /*<!-- BEGIN FORM-->*/ ?>
                        <?php /*<form action="#" id="form_sample_2" class="form-horizontal">*/ ?>
                            <?php /*<div class="form-body">*/ ?>
                                <?php /*<div class="alert alert-danger display-hide">*/ ?>
                                    <?php /*<button class="close" data-close="alert"></button>*/ ?>
                                    <?php /*You have some form errors. Please check below.*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="alert alert-success display-hide">*/ ?>
                                    <?php /*<button class="close" data-close="alert"></button>*/ ?>
                                    <?php /*Your form validation is successful!*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="form-group">*/ ?>
                                    <?php /*<label class="control-label col-md-3">Name <span class="required">*/ ?>
										<?php /** </span>*/ ?>
                                    <?php /*</label>*/ ?>
                                    <?php /*<div class="col-md-4">*/ ?>
                                        <?php /*<div class="input-icon right">*/ ?>
                                            <?php /*<i class="fa"></i>*/ ?>
                                            <?php /*<input type="text" class="form-control" name="name"/>*/ ?>
                                        <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="form-group">*/ ?>
                                    <?php /*<label class="control-label col-md-3">Email <span class="required">*/ ?>
										<?php /** </span>*/ ?>
                                    <?php /*</label>*/ ?>
                                    <?php /*<div class="col-md-4">*/ ?>
                                        <?php /*<div class="input-icon right">*/ ?>
                                            <?php /*<i class="fa"></i>*/ ?>
                                            <?php /*<input type="text" class="form-control" name="email"/>*/ ?>
                                        <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="form-group">*/ ?>
                                    <?php /*<label class="control-label col-md-3">URL <span class="required">*/ ?>
										<?php /** </span>*/ ?>
                                    <?php /*</label>*/ ?>
                                    <?php /*<div class="col-md-4">*/ ?>
                                        <?php /*<div class="input-icon right">*/ ?>
                                            <?php /*<i class="fa"></i>*/ ?>
                                            <?php /*<input type="text" class="form-control" name="url"/>*/ ?>
                                        <?php /*</div>*/ ?>
                                        <?php /*<span class="help-block">*/ ?>
											<?php /*e.g: http://www.demo.com or http://demo.com </span>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="form-group">*/ ?>
                                    <?php /*<label class="control-label col-md-3">Number <span class="required">*/ ?>
										<?php /** </span>*/ ?>
                                    <?php /*</label>*/ ?>
                                    <?php /*<div class="col-md-4">*/ ?>
                                        <?php /*<div class="input-icon right">*/ ?>
                                            <?php /*<i class="fa"></i>*/ ?>
                                            <?php /*<input type="text" class="form-control" name="number"/>*/ ?>
                                        <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="form-group">*/ ?>
                                    <?php /*<label class="control-label col-md-3">Digits <span class="required">*/ ?>
										<?php /** </span>*/ ?>
                                    <?php /*</label>*/ ?>
                                    <?php /*<div class="col-md-4">*/ ?>
                                        <?php /*<div class="input-icon right">*/ ?>
                                            <?php /*<i class="fa"></i>*/ ?>
                                            <?php /*<input type="text" class="form-control" name="digits"/>*/ ?>
                                        <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                                <?php /*<div class="form-group">*/ ?>
                                    <?php /*<label class="control-label col-md-3">Credit Card <span class="required">*/ ?>
										<?php /** </span>*/ ?>
                                    <?php /*</label>*/ ?>
                                    <?php /*<div class="col-md-4">*/ ?>
                                        <?php /*<div class="input-icon right">*/ ?>
                                            <?php /*<i class="fa"></i>*/ ?>
                                            <?php /*<input type="text" class="form-control" name="creditcard"/>*/ ?>
                                        <?php /*</div>*/ ?>
                                        <?php /*<span class="help-block">*/ ?>
											<?php /*e.g: 5500 0000 0000 0004 </span>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div class="form-actions">*/ ?>
                                <?php /*<div class="row">*/ ?>
                                    <?php /*<div class="col-md-offset-3 col-md-9">*/ ?>
                                        <?php /*<button type="submit" class="btn green">Submit</button>*/ ?>
                                        <?php /*<button type="button" class="btn default">Cancel</button>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</form>*/ ?>
                        <?php /*<!-- END FORM-->*/ ?>
                    <?php /*</div>*/ ?>
                <?php /*</div>*/ ?>
                <?php /*<!-- END VALIDATION STATES-->*/ ?>
            <?php /*</div>*/ ?>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescripts'); ?>

    <script>

        jQuery(document).ready(function () {
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
//            EcommerceOrders.init();
//            UIConfirmations.init();
        });
        $(function () {
            $(".wrapper1").scroll(function () {
                $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
            });
            $(".wrapper2").scroll(function () {
                $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.acc_set').addClass('active');
            $('.acc_set .arrow').addClass('open');
            $('.add_free_time').addClass('active');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin::layouts.adminLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>