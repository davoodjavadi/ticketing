
<!DOCTYPE html>
<html lang="en">
<head>
  <title>بستن پیام</title>
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
        <p>سلام {{ $details->user->name }} ,<br>
           تیکت <b>{{ $details->ticket_code }}</b> بسته شد. </p>
        <hr>
        <p>شما می توانید جزئیات درخواستتان را در <a href="{{url('ticket/'.$details->id)}}"> اینجا </a> ببینید.</p>
    </div>


    </div>
</div>

</body>
</html>