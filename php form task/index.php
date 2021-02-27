<?php

//validation messages

$alertMsg = '';
$alertClass = '';
//checking for submit

  if (filter_has_var(INPUT_POST, 'submit')) {
    //get data
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];

    $value3 = $_POST['value3'];

    if (!empty($value1) && !empty($value2) && !empty($value3)) {
      //enter a valid email

      if (filter_var($value3, FILTER_VALIDATE_EMAIL) === false) {
        $alertMsg = "Please enter a valid email";
        $alertClass = "danger";
      } else {
        $alertMsg = "Successful";
        $alertClass = "success";
      }
      
    } else {
      //validation

      $alertMsg = "Please enter all fields";
      $alertClass = "danger";
    } 

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP Form task</title>

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Contact Form</h1>

      <?php if($alertMsg != ''): ?>
      <div class="center <?php echo $alertClass; ?>">
        <?php echo $alertMsg; ?>
      </div>

      <?php endif; ?>
      <form method="POST" autocomplete="of">
        <input
          type="text"
          name="value1"
          class="input-field"
          placeholder="First Name"
          required
        />
        <input
          type="text"
          name="value2"
          class="input-field"
          placeholder="Last Name"
          required
        />

        <input
          type="email"
          name="value3"
          class="input-field"
          placeholder="Please Enter your Email"
          required
        />

        <br />

        <button type="submit" name="submit">Submit</button>
      </form>

      <?php if($alertMsg != ''): ?>
      <div class="details"><?php echo 'Your First name is ' .$value1; ?></div>
      <div class="details"><?php echo 'Your Last name is ' .$value2; ?></div>
      <div class="details"><?php echo 'Your Email is ' .$value3; ?></div>

      <?php endif; ?>
    </div>

    <script>
      const message = document.querySelector(".center");

      setTimeout(() => {
        message.style.display = "none";
      }, 2000);
    </script>
  </body>
</html>
