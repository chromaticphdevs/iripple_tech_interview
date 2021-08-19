<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Issues</h4>
                <a href="<?php echo _route('issue:create')?>">Create</a>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Issue Number</th>
                            <th>Subject</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Grade</th>
                            <th>Release Date</th>
                            <th>Dead line</th>
                        </thead>

                        <tbody>
                            <?php $counter = 0?>
                            <?php foreach($issues as $row): ?>
                                <tr>
                                    <td><?php echo ++$counter?></td>
                                    <td>
                                        <a href="<?php echo _route('issue:show' , $row->id)?>">
                                            <?php echo $row->issue_number?>
                                        </a>
                                    </td>
                                    <td><?php echo $row->subject?></td>
                                    <td>
                                        <span class='badge badge-<?php echo isEqual($row->role , 'developer') ? 'success' : 'primary'?>'><?php echo $row->role?></span>
                                    </td>
                                    <td><?php echo $row->status?></td>
                                    <td><?php echo $row->grade?></td>
                                    <td><?php echo $row->release_date?></td>
                                    <td><?php echo $row->finishing_date?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php loadTo()?>