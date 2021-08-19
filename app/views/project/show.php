<?php build('content') ?>
    <?php divider()?>
    <?php Flash::show()?>
    <div class="row">
        <div class="col-md-6 py-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-subtitle">Project</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Code</td>
                                <td><?php echo $project->code?></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td><?php echo $project->project?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 py-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-subtitle">Users On board</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php divider()?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Issues</h4>
            <a href="<?php echo _route('issue:create' , null , [
                'project' => $project->id
            ])?>">Add Issue</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable">
                    <thead>
                        <th>Issue Number</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Grade</th>
                        <th>Release Date</th>
                        <th>Deadline</th>
                        <th>Developer</th>
                    </thead>

                    <tbody>
                        <?php foreach($issues as $row) :?>
                            <tr>
                                <td>
                                    <a href="<?php echo _route('issue:show' , $row->id)?>"><?php echo $row->issue_number?></a>
                                </td>
                                <td><?php echo $row->subject?></td>
                                <td><?php echo $row->status?></td>
                                <td><?php echo $row->grade?></td>
                                <td><?php echo $row->release_date?></td>
                                <td><?php echo $row->finishing_date?></td>
                                <td>
                                    <?php if($row->developer ):?>
                                        <?php echo $row->developer->first_name?>
                                    <?php else:?>
                                        <p>Not Assigned</p>
                                    <?php endif?>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>