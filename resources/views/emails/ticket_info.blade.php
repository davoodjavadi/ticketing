
<!DOCTYPE html>
<html lang="en">
<head>
  <title>پیام ارسال شد</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="Aothur" content="Davood javadi" />
  <meta name="designer" content="javadi.davood@gmail.com" />
  <meta name="robots" content="index,follow" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--  <link rel="stylesheet" type="text/css" href="../css/ticketing.css" /> -->
</head>

<body style="direction: rtl;">
  <div class="container-fluid">
    <div class="content-wrapper">

      <div class="cal-md-12 col-sm-12">
        <p>سلام {{ $userName }} </p>
         <p> پیام شما دریافت شد. گروه پشتیبانی در سریع ترین زمان به پیام شما رسیدگی می کند.<br>
          از ارتباط شما متشکریم<br>
          گروه پشتیبانی
        </p>
      <ul>
        <h4>اطلاعات پیام شما</h4>
        <li>
          عنوان : <b> {{ $details->title }}</b>
        </li>
        <hr>
        <li>
          اولویت : <b> {{ $details->priority }} </b>
        </li>
        <hr>
        <li>
          وضعیت : <b>{{ $details->status }}</b>
        </li>
        <hr>
        <li>
          شماره درخواست :  <b>{{ $details->ticket_code }}</b>
        </li>
      </ul>

        <p>شما می توانید لیست درخواست هایتان را در <a href="{{url('ticket/'.$details->id)}}"> اینجا </a> ببینید.</p>
    </div>


    </div>
</div>

</body>
</html>