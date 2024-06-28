<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>
<style>
     @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        *{
            font-family: 'Poppins';
        }
</style>
<body>
    <p> Dear Alumni,</p>

   <p><span style="font-weight:bolder"></span> {{ ucfirst($data['body']) }}.</p>
   <p> Please complete the survey using the link below:</p>
   <p> [https://aets.vercel.app/alumnilog]</p>
   <p> Thank you for your participation!</p>
   <p>Best regards,</p>
   <p>Admin</p>

</body>
</html>
