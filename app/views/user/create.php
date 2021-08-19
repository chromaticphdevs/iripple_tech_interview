<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create User</h4>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('user:create'),
                        'method' => 'post'
                    ])
                ?>
                <div class="form-group">
                    <?php
                        Form::label('First Name *');
                        Form::text('first_name' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your first name'
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Last Name *');
                        Form::text('last_name' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your last name'
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Email *');
                        Form::email('email' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your email'
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Password *');
                        Form::password('password' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Enter your email'
                        ])
                    ?>
                </div>

                <?php Form::submit('' , 'Create User')?>

                <?php Form::close()?>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>