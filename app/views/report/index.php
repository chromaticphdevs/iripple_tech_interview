<?php build('content') ?>
    <?php divider()?>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Report(OVERALL ISSUES)</h4>
        </div>

        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        <h3>Passed Issues</h3>
                        <h2><?php echo count( $report['passedLists']) ?></h2>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        <h3>Failed Issues</h3>
                        <h2><?php echo count( $report['failedLists']) ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="card-subtitle">Data Lists</h4>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-subtitle">Passed Issues</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Issue Number</td>
                                <td>Cycle</td>
                            </tr>

                            <?php foreach($report['passedLists'] as $passed) :?>
                                <tr>
                                    <td>
                                        <a href="#"><?php echo $passed->issue_number?></a>
                                    </td>
                                    <td><?php echo $passed->total_cycle?></td>
                                </tr>
                            <?php endforeach?>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="card-subtitle">Failed Issues</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Issue Number</td>
                                <td>Cycle</td>
                            </tr>

                            <?php foreach($report['failedLists'] as $passed) :?>
                                <tr>
                                    <td>
                                        <a href="#"><?php echo $passed->issue_number?></a>
                                    </td>
                                    <td><?php echo $passed->total_cycle?></td>
                                </tr>
                            <?php endforeach?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>