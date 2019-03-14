<!DOCTYPE html>
<html lang="en">
<head>
    <title>Conrads Fine Dryclean Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>

<body style="background: #e8e8ea; ">

    <div class="container">

        <div class="row">           

            <div class="col-md-4 col-md-offset-4 text-center">

                <div class="login-title">

                    <h3><span>Admin</span>Conrads Fine Dryclean</h3>

                </div>

                 <?php if(isset($msg) || validation_errors() !== ''): ?>

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo validation_errors();?>
                        <?php echo isset($msg)? $msg: ''; ?>
                    </div>   

                <?php endif; ?>

                <div class="form-box">

                    <?php echo form_open(base_url('admin/login/reset_password'), 'class="login-form" '); ?>
                        <div class="form-group has-feedback">
                            <input type="email" name="admin_email" class="form-control" placeholder="Enter Your Register Email">
                        </div>

                        <div class="form-group has-feedback">
                            <input type="email" name="admin_otp" maxlength="4" class="form-control" placeholder="OTP">
                        </div>

       
                        <div class="row">      
                            <div class="col-xs-12">
                                 <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="SUBMIT">
                            </div>   
                        </div>
                    <?php echo form_close(); ?>

                </div>

            </div>

        </div>

    </div>

</body>



    <!-- Bootstrap 3.3.6 -->

    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    

    <!-- AdminLTE App -->

    <script src="<?= base_url() ?>assets/js/app.min.js"></script>

  



    <style type="text/css">

    .login-title{

        padding-top: 80px;

    }

    .login-title span{

        font-size: 30px;

        line-height: 1.9;

        display: block;

        font-weight: 700;

    }

    .form-box{

        position: relative;

        background: #ffffff;

        max-width: 375px;

        width: 100%;

        border-top: 5px solid #605ca8;

        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);

        padding: 30px;

    }



    .caption{

        margin-bottom:40px;

    }

    .login-form input[type=text], .login-form input[type=password]{

        margin-bottom:10px;

    }



    .login-form input {

        outline: none;

        display: block;

        width: 100%;

        border: 1px solid #d9d9d9;

        margin: 0 0 20px;

        padding: 10px 15px;

        box-sizing: border-box;

        border-radius: 0;

        -moz-border-radius: 0;

        -webkit-border-radius: 0;

        min-height: 40px;

        font-wieght: 400;

        -webkit-transition: 0.3s ease;

        transition: 0.3s ease;

    }



    .login-form input[type=submit]{

        cursor: pointer;

        background: #605ca8;

        width: 100%;

        border: 0;

        padding: 8px 15px;

        color: #ffffff;

        -webkit-transition: 0.3s ease;

        transition: 0.3s ease;

        border-radius: 0;

        -moz-border-radius: 0;

        -webkit-border-radius: 0;

        min-height: 40px;

        

    }

    </style>

</html>