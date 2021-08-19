<?php build('content') ?>
    <?php divider()?>
    <?php Flash::show()?>
    <div class="row">
        <div class="col-md-6 py-2">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Issue Number</td>
                                <td><strong><?php echo $issue->issue_number?></strong></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td><?php echo $issue->type?></td>
                            </tr>

                            <tr>
                                <td>Subject</td>
                                <td><?php echo $issue->subject?></td>
                            </tr>

                            <tr>
                                <td>Release Date</td>
                                <td><?php echo $issue->release_date?></td>
                            </tr>

                            <tr>
                                <td>Deadline</td>
                                <td><?php echo $issue->finishing_date?></td>
                            </tr>

                            <tr>
                                <td>Project</td>
                                <td>
                                    <a href="<?php echo _route('project:show' , $issue->project->id)?>">
                                        <?php echo $issue->project->code?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td><?php echo $issue->status?></td>
                            </tr>

                            <?php if( !isEqual($issue->status , 'on-going')) :?>
                                <tr>
                                    <td>Grade</td>
                                    <td><?php wBadgeBuilder($issue->grade)?></td>
                                </tr>
                            <?php endif?>
                            <tr>
                                <td>Cycles</td>
                                <td>
                                    <?php 
                                        if($cycles)
                                        {
                                            echo count( $cycles );
                                        }else{
                                            echo '0';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <p style="max-width: 400px;"><?php echo $issue->description?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 py-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Developer And Tester</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-subtitle">Developer</h4>
                    <?php if( !is_null($developer) ):?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $developer->first_name . ' ' .$developer->last_name?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $developer->email?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif?>
                </div>

                <div class="card-body">
                    <h4 class="card-subtitle">Tester</h4>
                    <?php if( !is_null($tester) ):?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $tester->first_name . ' ' .$tester->last_name?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $tester->email?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
    <?php divider()?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Cycles</h4>
            <a href="<?php echo _route('cycle:create' , null , [
                'issue_id' => $issue->id
            ])?>">Add Cycle</a>
        </div>

        <div class="card-body">
            <?php if($cycles) :?>
            <div class="table-responsive">
                <table class="table table-bordered dataTable">
                    <thead>
                        <th>Cycle Number</th>
                        <th>Date</th>
                        <th>Grade</th>
                        <th>Notes</th>
                        <th>Tester</th>
                    </thead>
                
                    <tbody>
                        <?php foreach($cycles as $row):?>
                            <tr>
                                <td>
                                    <a href="#"><?php echo $row->cycle_number?></a>
                                </td>
                                <td><?php echo $row->date?></td>
                                <td><?php echo $row->grade?></td>
                                <td>
                                    <p style="max-width:400px"><?php echo $row->notes?></p>
                                </td>
                                <td><?php echo $row->tester->first_name?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
            <?php else:?>
                <p>No Cycles Found</p>
            <?php endif?>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>