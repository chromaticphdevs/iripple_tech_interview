<?php build('content')?>
    <?php divider()?>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <a href="<?php echo _route('project:create')?>">Add Project</a>
                    <p>Start By creating the project , then create your issues</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <a href="<?php echo _route('issue:create')?>">Add Issues</a>
                    <p>Add issues to be tracked down</p>
                </div>
            </div>
        </div>
    </div>

    <?php if($projects) :?>
        <?php divider()?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Projects</h4>
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
                                        <a href="<?php echo _route('project:show' , $row->id)?>">View</a>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif?>
<?php endbuild()?>
<?php loadTo()?>