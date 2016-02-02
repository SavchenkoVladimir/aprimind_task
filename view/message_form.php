<!DOCTYPE HTML>
<html lang="en">
<head>
<meta name="robots" content="noindex" />
<meta charset="UTF-8" />
<title>Message form</title>
<meta name="description" content="Apprimind test task" />
<meta name="keywords" content="Apprimind test task" />
<link href="/aprimindTask/css/style.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
  <script src="/aprimindTask/js/html5shiv/html5shiv.js"></script>
<![endif]-->
</head>
<body>
  <section>
    <form name="mess" action="/aprimindTask/controllers/formController.php" method="POST">
      <div class="inputgroup_container">
        <ul class="left">
          <li>
            <label for="first_name">first_name*</label>
            <input type="text" name="first_name" placeholder="John" tabindex="1" maxlength="50" />
          </li>
          <li>
            <label for="company">Your company</label>
            <input type="text" name="company" tabindex="3" maxlength="255" />
          </li>
          <li>
            <label for="email">Email*</label>
            <input type="text" name="email" tabindex="5" maxlength="255" />
          </li>
        </ul>
        <ul class="right">
          <li>
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" placeholder="Doe" tabindex="2" maxlength="50" />
          </li>
          <li>
            <label for="phone">Phone number</label>
            <input type="text" name="phone" placeholder="+38(050)759-20-16" tabindex="4" maxlength="20" />
          </li>
          <li>
            <label for="job_title">Job title</label>
            <input type="text" name="job_title" tabindex="6" maxlength="255" />
          </li>
        </ul>
        </div>
        <div class="textarea_cont">
          <label for="message">Message</label>
          <textarea name="message" tabindex="8" maxlength="1000"></textarea>
          <button type="submit" name="submit" value="on">NOW<img src="/aprimindTask/img/button_arrow.png"></button>
        </div>              
      </form>
    <div class="decor"></div>
  </section>
<script src="/aprimindTask/js/jquery-2.1.4.min.js"></script>
<script src="/aprimindTask/js/scripts.js"></script>
</body>
</html>