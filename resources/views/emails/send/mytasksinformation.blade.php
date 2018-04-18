
    <div class="">
        <div>
        <div style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;color:#74787e;height:100%;line-height:1.4;margin:0;width:100%!important;">
            <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;margin:0;padding:0;width:100%">
                <tbody>
                <tr>
                    <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                        <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0;padding:0;width:100%">
                            <tbody><tr>
                                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:25px 0;text-align:center;background-color:#4c5667;border-top-right-radius:18px;border-top-left-radius:18px">
                                    <a style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#fff;font-size:26px;font-weight:bold;text-decoration:none">
                                        {{ config('app.name') }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;border-bottom:1px solid #edeff2;border-top:1px solid #edeff2;margin:0;padding:0;width:100%;border-right:thin solid;border-left:thin solid">
                                    <table align="center" width="570" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px">
                                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;
                                                    box-sizing:border-box;color:#2f3133;font-size:20px;
                                                    font-weight:bold;margin-top:0;text-align:left">Hi {{ $user }},</h1>
                                                    <p style="font-family:Avenir,Helvetica,
                                                    sans-serif;box-sizing:border-box;
                                                    color:#74787e;font-size:15px;
                                                    line-height:1.5em;margin-top:0;text-align:left">
                                                        These are your tasks that you have to date and are not completed:
                                                    </p>
                                                    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:30px auto;padding:0;text-align:center;width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                
                                                                                              <table style="border-collapse: collapse;width: 100%;
                                                                                                max-width: 100%;background-color: white;
                                                                                                border-spacing: 2px;border-top-right-radius: 10px;
                                                                                                border-top-left-radius: 10px;
                                                                                                display: table;border-spacing: 2px;overflow: hidden;">
                                                                                                    <thead style="vertical-align: middle;
                                                                                                    font-size:16px;vertical-align: bottom;
                                                                                                    border-bottom: 2px solid #ebeff2;
                                                                                                    border-top: 1px solid #ebeff2;line-height: 1.2;">
                                                                                                        <tr style="height: 60px;
                                                                                                        background: #4c5667;color: #fff;text-align:center;font-weight:bold;">
                                                                                                            <th style="padding: 1rem;">Name</th>
                                                                                                            <th style="padding: 1rem;">Due Date</th>
                                                                                                            <th style="padding: 1rem;">Progress (%)</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody style="vertical-align: middle;
                                                                                                    border:2px solid #4c5667;
                                                                                                    font-family: OpenSans-Regular;
                                                                                                    font-size: 15px;">
                                                                                                        @foreach($tasks as $task)
                                                                                                            <?php
                                                                                                                $class="#e6e6e6";
                                                                                                                $result = 0;
                                                                                                                $date;
                                                                                                                    if($task->due_date == NULL){
                                                                                                                        $date = "No defined";
                                                                                                                    }else{
                                                                                                                        $date = date('Y-m-d H:i', strtotime($task->due_date));
                                                                                                                    }
                                                                                                                    if($loop->index % 2 == 0){
                                                                                                                        $class = "#fff";
                                                                                                                    }
                                                                                                                    if($task->task_subtasks()->count() != 0){
                                                                                                                        $result =  ($task->task_subtasks()->where('isComplete',1)->count() /
                                                                                                                                $task->task_subtasks()->count()) * 100;
                                                                                                                    }
                                                                                                            ?>
                                                                                                            <tr style="background-color: {{ $class }};
                                                                                                            color: #808080;vertical-align: top;">
                                                                                                                <td style="padding: 1rem;text-align: left;">{{ $task->name }}</td>
                                                                                                                <td style="padding: 1rem;text-align: center;">{{ $date }}</td>
                                                                                                                <td style="padding: 1rem;text-align: right;">{{ $result }} %</td>
                                                                                                            </tr>
                                                                                                        @endforeach
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:15px;line-height:1.5em;margin-top:0;text-align:left">Thanks,<br>
                                                    {{ config('app.name') }}</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr style="background-color:#4c5667">
                                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                    <table align="center" width="570" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0 auto;padding:0;text-align:center;width:570px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px">
                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;line-height:1.5em;margin-top:0;color:#fff;font-size:13px;text-align:center">© 2018 {{ config('app.name') }}. All rights reserved.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>


