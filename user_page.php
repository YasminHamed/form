<?php

// @include 'config.php';

// session_start();

// if(!isset($_SESSION['admin_name'])){
//    header('location:login_form.php');
// } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>
         Hello, 
         <span>user</span>
         <img width="30px" src="data:image/png;base64,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"/>
      </h3>
      <br>
      <h1>Welcome, Yasmin <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAFS0lEQVRoge2ZfWhVdRjHn6u7mampTQ2rkUEKEd5sUqsIcVmBL72wIijLFOu/QogoqGUQJv0RQTSmf4RWaFkxK5yVpbipFdIbmyRSOXNY5ta7bzWbn/74PWf32dk59/7OuRtL2ANjl/M85/v8Puc+5/m9XJEhG7IhK2QZ30BghogsEJGbROQSEZmkrg4RaRORj0WkMZPJtHjqTROR+SJSLSIVqndaRA6JSLuIbBGRzZlM5ojvGIslrAK24W+fALMK6F0DbPXUOg28BUwtBSALrDKivwNrgBpgKjBK/6YBdwBrgT9MfD2QNXojgdeM/ziwEVgKXK86lwGzgUeBJqBbY7uAWsC7goKk56kQwAngWWC8x33jgZXASb23CSgHKoAv9dpJ4Hlgoofe5UCDgX8bOMcXImsgfgAqvW7srTETOKgarcAB/dyeUu8e/QYB3gOG+dwUlFMbcH7SpEZnErDHPM0vStSrBP5UreeKBV+ngUeB6WmTqlYO6FS9LcC5peip5i363nQDVxQKDErqiRITWoiNmJe+VDMVsyku4EoN+BkYVUKiHNAxEBCqf4F5Xy6NCnhKnS+VkMQLAte21+M6XLKW6u5/Q3Msi3LuVOfcFAwCTE8A0WyawOqkMMBCvXdzlLNdnRUpICYDPyWEaDclkggGN3EC7A07MsA/uCXBWSlA6lR4myfEAWAKMAc34SaCwU28AL/1N8h+FY5siVEQxncz+ZWAFwxwtsafiHKWUlpBqx2bBMLEzAX+9oXRbxOgLcq5Q53zUoAEA12YFMLELtCqKAoD3KhxO6OcteqsSwFyZ1CzwCJcr5+FW5YUhTA6t+FWugVhcItOgBVRzhnqPAKMTgETiIftWx8Io1MDnIqDwS1qg0VoVZzIdg2oTQqi988HGnEv/9fACmBcCp27DMwqCwM8qNdbiFsFA9dq0DEgVyTZSGB40kH6GnA38K+Fwc1Xh/XarcUE6k1d99n8ABcBH2qSY8CTcbXsOeAdwO6YXPeR3yWuBnbp5/d9hO3GqgWYYHxTTH0eBv6Kq+UEILtVYw8R+xVgsYEB+B6P3Wpwc7lC9MCEIJpwrdVeezolSDnwlWrsBSZHxDyAm6wBlidNMMHA2O1qE2aZrzC/4OaAVMt/3BlB0Kr3ARdGxDyi/v1pEliYPhAak8F1KIDPgGXENAFcg3gH183CbXWcKbPvCK0wcMdSAB2JQVSgUgWOA2MiIOyRUWANRCwecY0imPB6tVX1jwU+DZ48cLFetyWcbr8ETFSBbmB2DEQXcD9QTX7dtS5Gr6YIzBjye6ODwGPkT2Sa8D0Oikm+XoWO4pYew0IQNSY2h3tnAOakhBlNvtUG9hElbMEDYbv468Kdd/WBMPEvqH8rMTtOD5hF6vsGuJf+mnz1Kb0bekqLI+LsNxJYXXighWBw70TwsB7uF4BQ4gxum7lPk1RHQATvSCOwhPw+vj5G08KsAeaRf7G3A2X9DmKSP66JOtE1WQiip2vR+1Didg+YwJpJsQpPClJG/nD5V+BF/d8LwsQvVd8HxPxEALypMa24o6kRAwphEmeBdaGnuCkCIqtlZu1lev/kkMNtyqDQUehAGnAD8LkOYknIlzXf3Clggxlwg/ptSa4dFAgz4Id0IB3o4XcIoqdNhwa+C/cDUmRJDgZIGfndZYe+E41hCBN/VajUXh10iMBw80xzaIBxE+bV6u8EZg7GeAsaMALXcVp1oBsiYmxprRyMcXob7qc39MXOmeuRc83/2oBXTPlU6d+ZBSEiAgwHXqevnTkQgWk3ewb4ETgELGcg105DNmT9b/8BKVX0eVAxusAAAAAASUVORK5CYII="></h1>
      <p class="page">This is the home page <img width="50px" src="data:image/png;base64,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"/></p>
      <p class="page">go on start browsing and enjoy a special experience</p>
      <br>
      <a href="logout.php" class="submit-button">logout</a>
   </div>

</div>

</body>
</html>