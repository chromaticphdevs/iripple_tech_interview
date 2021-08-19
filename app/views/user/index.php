<?php build('content')?>
    <?php divider()?>
    <?php Flash::show()?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Users</h4>
            <a href="<?php echo _route('user:create')?>">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable">
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php foreach($users as $uIndex => $user) :?>
                            <tr>
                                <td><?php echo $user->first_name?></td>
                                <td><?php echo $user->last_name?></td>
                                <td><?php echo $user->email?></td>
                                <td>
                                    <a href="<?php echo _route('user:edit' , $user->id)?>">Edit</a>
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