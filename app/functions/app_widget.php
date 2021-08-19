<?php   

    function wBackgroundImage( $attributes = [])
    {
        $size = $attributes['size'] ?? '15px';

        $image = URL.DS.'public/assets/logo_no_bg.png';
        
        print <<<EOF
            <div style='margin:0px auto;margin-top:30px; width:$size;'>
                <img src="{$image}" style="width:100%">
            </div>
        EOF;
    }


    function wLock($isLock , $attributes = [])
    {

        $size = $attributes['size'] ?? '15px';

        if( $isLock ) {
            print <<<EOF
                <i class='feather icon-lock text-danger' font-size="{$size}" title="private"> </i>
            EOF;
        }else
        {
            print <<<EOF
                <i class='feather icon-unlock text-success' font-size="{$size}" title="public"> </i>
            EOF;
        }
    }

    function divider()
    {
        print <<<EOF
            <div style='margin:30px 0px'>
            </div>
        EOF;
    }

    function wReturnLink( $route )
    {
        print <<<EOF
            <a href="{$route}">
                <i class="feather icon-corner-up-left"></i> Return
            </a>
        EOF;
    }

    function wProgressBar($value , $attributes = null)
    {   

        $color  = 'primary';

        $size   = '15px';

        if( ! is_null($attributes) )
        {
            if( is_string($attributes) )
                $color = $attributes;
            if( is_array($attributes) ){
                $size = $attributes['size'] ?? '15px';
            }
        }

        if( $value > 60){
            $color = 'success';
        }elseif($value < 50 && $value > 30) {
            $color = 'primary';
        }elseif($value < 30){
            $color = 'warning';
        }

        if( $value < 3)
            $color = 'danger';

        if( $value < 1)
        {
            $html = <<<EOF
                <span class='badge badge-info' style="height:{$size}"> No Completion Recorded.</span>
            EOF;
        }else
        {
            $html = <<<EOF
                <div class="progressbar-list">
                    <div class='progress' style="height:{$size}">
                        <div class="progress-bar progress-bar-striped bg-{$color} progress-bar-animated"
                            role="progressbar" style="width:{$value}%"
                            aria-valuenow="{$value}"
                            aria-valuemin="0" aria-valuemax="100">
                        {$value}%
                        </div>
                    </div>
                </div>
            EOF;
        }
        

        return $html;
    }

    function wProjectNavigation( $projectId )
    {
        $expensesRoute =  _route('sop:index' , $projectId);
        $sopRoute =  _route('pie:index' , $projectId);
        $taskRoute =  _route('task:index' , $projectId);
        $milestoneRoute =  _route('milestone:index' , $projectId);
        $peopleRoute =  "/ProjectIndividualController/index/{$projectId}";
        $projectRoute = _route('project:show' , $projectId);
        $activityRoute = _route('pActivity:index' , $projectId);
        print <<<EOF
            <ul class="nav nav-pills justify-content-center">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" 
                    href="{$projectRoute}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" 
                    href="{$expensesRoute}">Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" 
                    href="{$sopRoute}">Slicing Pie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{$milestoneRoute}">Tasks & Milestones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{$peopleRoute}">People</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{$activityRoute}">Acitivities</a>
              </li>
            </ul>
        EOF;
    }


    function wBadgeBuilder($status , $text = '' , $style = '')
    {
        $success = ['success' , 'on-going','pending' , 'mid' , 'passed'];

        $info = ['warning','complete' , 'completed' , 'ok' , 'finished' , 'finish' , 'low'];

        $danger   = ['removed' , 'delete' , 'deleted' , 'fatal' , 'error' , 'danger' , 'high' , 'failed'];


        $text = empty($text) ? $status : $text;



        if( !empty($style) )
            $style = "style='{$style}'";

        if( isEqual($status , $success) )
        {
            print <<<EOF
            <span class="badge badge-success" {$style}><?php echo $status?>{$text}</span>
            EOF;
        }

        if( isEqual($status , $info) )
        {
            print <<<EOF
            <span class="badge badge-info" {$style}><?php echo $status?>{$text}</span>
            EOF;
        }


        if( isEqual($status , $danger) )
        {
            print <<<EOF
            <span class="badge badge-danger" {$style}><?php echo $status?>{$text}</span>
            EOF;
        }

    }