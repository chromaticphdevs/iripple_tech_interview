<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-5">
        <?php Flash::show()?>
        
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Name</h4>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('user:edit' , $user->id),
                        'method' => 'post'
                    ])
                ?>
                <div class="form-group">
                    <?php
                        Form::label('First Name *');
                        Form::text('first_name' , $user->first_name , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your first name'
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Last Name *');
                        Form::text('last_name' ,  $user->last_name , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your last name'
                        ])
                    ?>
                </div>

                <?php Form::submit('' , 'Save Changes ')?>

                <?php Form::close()?>
            </div>
        </div>
        
        <?php divider()?>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Email</h4>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('user:editEmail'),
                        'method' => 'post'
                    ]);

                    Form::hidden('id' , $user->id);
                ?>
                <div class="form-group">
                    <?php
                        Form::label('Email*');
                        Form::email('email' , $user->email , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your first name'
                        ])
                    ?>
                </div>
                <?php Form::submit('' , 'Save Changes ')?>

                <?php Form::close()?>
            </div>
        </div>

        <?php divider()?>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Password</h4>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('user:editPassword'),
                        'method' => 'post'
                    ]);

                    Form::hidden('id' , $user->id);
                ?>
                <div class="form-group">
                    <?php
                        Form::label('Password*');
                        Form::password('password' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                        ])
                    ?>
                </div>
                <?php Form::submit('' , 'Save Changes ')?>

                <?php Form::close()?>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>