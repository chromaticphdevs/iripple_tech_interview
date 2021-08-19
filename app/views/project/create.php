<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Project</h4>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('project:create'),
                        'method' => 'post'
                    ])
                ?>
                <div class="form-group">
                    <?php
                        Form::label('Project Name');
                        Form::text('project' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Eg. IRIPPLE BUGTRACKER TECH EXAM'
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Code *');
                        Form::text('code' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Unique code for this project'
                        ])
                    ?>
                </div>

                <?php Form::submit('' , 'Create Project')?>

                <?php Form::close()?>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>