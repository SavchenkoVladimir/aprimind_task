<!DOCTYPE HTML>
<html lang="en">
<head>
<meta name="robots" content="noindex" />
<meta charset="UTF-8" />
<title>Resaults</title>
<meta name="description" content="Apprimind test task" />
<meta name="keywords" content="Apprimind test task" />
<link href="/aprimindTask/css/style.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
  <script src="/aprimindTask/js/html5shiv/html5shiv.js"></script>
<![endif]-->
</head>
<body>
  <article>
    <h2>Resaults</h2>
    <div class="table">
      <div class="thead">
        <div class="title">First name</div>  
        <div class="title">Last name</div>  
        <div class="title">Company</div>  
        <div class="title">Phone number</div>  
        <div class="title">Email</div>  
        <div class="title">Job title</div>  
        <div class="title_message">Message</div>  
      </div>
      <?php foreach( $data as $name ): ?>
      <div class="tr">
        <div class="td"><?php echo $name['first_name']; ?></div>
        <div class="td"><?php echo $name['last_name']; ?></div>
        <div class="td"><?php echo $name['company']; ?></div>
        <div class="td"><?php echo $name['phone']; ?></div>
        <div class="td"><?php echo $name['email']; ?></div>
        <div class="td"><?php echo $name['job_title']; ?></div>
        <div class="td_message"><?php echo $name['message']; ?></div>
      </div>
      <?php endforeach; ?>
    <div class="left_decor"></div>    	
    <div class="right_decor"></div>    	
    </div>
  </article>
</body>
</html>