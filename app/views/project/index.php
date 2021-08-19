<?php build('content') ?>
    <?php divider()?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Projects</h4>
                <a href="<?php echo _route('project:create')?>">Create</a>
                <?php Flash::show()?>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Project Code</th>
                            <th>Project</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php $counter = 0?>
                            <?php foreach($projects as $row): ?>
                                <tr>
                                    <td><?php echo ++$counter?></td>
                                    <td><?php echo $row->code?></td>
                                    <td><?php echo $row->project?></td>
                                    <td>
                                        <a href="<?php echo _route('project:show' , $row->id)?>">Show</a>
                                    </td>
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