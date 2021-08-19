<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Issue Cycle</h4>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <?php
                    Form::open([
                        'action' => _route('cycle:create'),
                        'method' => 'post'
                    ]);

                    Form::hidden('tester_id' , $userId);
                    Form::hidden('issue_id' , $issueId);
                ?>
                <div class="form-group">
                    <?php
                        Form::label('Date *');
                        Form::date('date' ,'' ,[
                            'class' => 'form-control',
                            'required' => '',
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Grade *');
                        Form::select('grade' ,['passed' , 'failed'] , '' ,[
                            'class' => 'form-control',
                            'required' => '',
                        ])
                    ?>
                </div>

                <div class="form-group">
                    <?php
                        Form::label('Notes *');
                        Form::textarea('notes' ,'',[
                            'class' => 'form-control',
                            'required' => '',
                            'rows' => 5
                        ])
                    ?>
                </div>

                <?php Form::submit('' , 'Create Issue')?>

                <?php Form::close()?>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>