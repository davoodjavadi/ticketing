
<!DOCTYPE html>
<html lang="en">
<head>
  <title>پاسخ پیام</title>
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
        <p>سلام {{ $details->ticket->user->name }} ,
          به تیکت <b>{{ $details->ticket->ticket_code }}</b> پاسخ داده شد. </p>
        <hr>
        <p>پاسخ :<br>
          {{ $details->comment }}
        </p>

          <ul>
        <li>
          فرستنده پاسخ : <b> {{ $details->user->name }}</b>
        </li>
        <hr>
        <li>
          اولویت درخواست : <b> {{ $details->ticket->priority }} </b>
        </li>
        <hr>
        <li>
          وضعیت : <b>{{ $details->ticket->status }}</b>
        </li>
        <hr>
          </ul>

        <p>شما می توانید لیست پاسخ هایتان را در <a href="{{url('ticket/'.$details->ticket->id)}}"> اینجا </a> ببینید.</p>
    </div>


    </div>
</div>

</body>
</html>