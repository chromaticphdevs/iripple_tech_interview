<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Issue</h4>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('issue:create'),
                        'method' => 'post'
                    ]);

                    if( $projectSelected )
                        Form::hidden('project_id' , $project->id);
                ?>
                <div class="form-group row">
                    <div class="col-md-3 col-sm-12">
                        <?php
                            Form::label('Type *');
                            Form::select('type' , ['Bugs' , 'Enhancement'] , '' ,[
                                'class' => 'form-control',
                                'required' => '',
                            ])
                        ?>
                    </div>
                                
                    <div class="col-md-9 col-sm-12">
                        <?php
                            if( $projectSelected )
                            {
                                Form::label('Project');
                                Form::text('' , $project->project ,[
                                    'class' => 'form-control',
                                    'readonly' => true
                                ]);
                            }else{
                                Form::label('Project*');
                                Form::select('project_id' , $projects ,'',[
                                    'class' => 'form-control',
                                    'required' => '',
                                ]);
                            }
                            
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Subject *');
                        Form::text('subject' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Subject'
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Description *');
                        Form::textarea('description' , '' , [
                            'class' => 'form-control',
                            'required' => '',
                            'placeholder' => 'Subject',
                            'rows' => 5
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                    Form::label('Developer');
                                    Form::select('developer_id' , $users , '' , [
                                        'class' => 'form-control'
                                    ]);
                                ?>
                            </div>

                            <div class="form-group">
                                <?php
                                    Form::label('Tester');
                                    Form::select('tester_id' , $users , '' , [
                                        'class' => 'form-control'
                                    ]);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                    Form::label('Release Date');
                                    Form::date('release_date' , '' , [
                                        'class' => 'form-control'
                                    ]);
                                ?>
                            </div>

                            <div class="form-group">
                                <?php
                                    Form::label('Dead line');
                                    Form::date('finishing_date' ,'' , [
                                        'class' => 'form-control'
                                    ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php Form::submit('' , 'Create Issue')?>

                <?php Form::close()?>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>