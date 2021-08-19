<?php build('content')?>
<div style="background: #fff !important;">
    <?php Flash::show('global')?>
    
    <div style="background-image:url('/assets/register_bg.png');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover; padding:30px 0px;">
        <?php divider()?>
        <div class="container" style="min-height:100vh !important">
            <div class="row justify-content-between">
                <div class="col-md-4 mx-auto">
                    <div class="card" style="border-radius: 25px; border: 2px solid #E2E2E2">
                        <div class="card-body text-left">
                            <div  style="width:100%">
                                <?php
                                    Form::open([
                                        'method' => 'post',
                                        'action' => _route('user:login')
                                    ]);
                                ?>
                                    <h4 class="text-primary my-4 text-center">Sign In</h4>
                                    <?php Flash::show()?>
                                    <div class="form-group">
                                        <?php
                                            Form::label('Email');
                                            Form::text('email' , '' , [
                                                'class' => 'form-control',
                                                'required' => '',
                                                'placeholder' => 'Enter Email',
                                                'id' => 'email'
                                            ]);
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <?php
                                            Form::label('Password');
                                            Form::password('password' , '' , [
                                                'class' => 'form-control',
                                                'required' => '',
                                                'placeholder' => 'Enter Password',
                                                'id' => 'password'
                                            ]);
                                        ?>
                                    </div>
                                                           
                                  <button type="submit" class="btn btn-success btn-lg btn-block font-18">Sign in</button>
                                <?php Form::close()?>
                            </div>
                            <!--social icons -->
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        <?php divider()?>
    </div>
</div>
<?php endbuild()?>
<?php loadTo('tmp/public_default')?>