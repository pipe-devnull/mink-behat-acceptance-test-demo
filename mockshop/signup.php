<?php
/**
 * Dummy sign up page used to demo some capabilities of
 * Behat & mink 
 * 
 */
session_start();

function signup($postData) { return true; }

/**
 * Validation inn this example is just checking that
 * all fields have been completed
 * 
 * @param  Array $postData       
 * @param  Array $expectedFields 
 * @return Boolea
 */
function validateFields(Array $postData, Array &$expectedFields)
{ 
  foreach ($postData as $key => $value)
  {
    if (in_array($key, $expectedFields) && !empty($value))
    {
      unset($expectedFields[array_search($key, $expectedFields)]);
    } 
  }
  return count($expectedFields) == 0;
}

// Flag for sign up attempts
$signupAttempt = false;
$postData      = array();

// Kick off some validation of posted values to this page
if (null != ($postData = $_POST))
{
  $signupAttempt = true;

  $valid = false;
  $expectedFields = array('inputEmail','firstname','lastname','agreed');

  if (!validateFields($postData, $expectedFields))
  {
    $errors = array_map(function ($field) { return "You must fill in the field <b>{$field}</b>";}, $expectedFields);
  }
  else
  {
    $valid = true;
    signup($postData);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mock Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/">Home</a></li>
          <li><a href="/shop.html">Shop</a></li>
          <li><a href="/basket.php">Basket</a></li>
          <li class="active"><a href="/signup.php">Sign Up</a></li>
        </ul>
        <h3 class="text-muted">Ascii Art Marketplace</h3>
      </div>

      <div class="jumbotron">
        <h1>Sign Up To The Ascii Art Marketplace</h1>
      </div>

      <div class="row marketing">

        <?php if ($signupAttempt): ?>
          
          <?php if (true === $valid): ?>

            <h3>Thanks for signing up! A million marketing emails are on the way!</h3>

          <?php else: ?>
            <h3>Sorry, there was a problem with your sign up</h3>
            
            <?php foreach ($errors as $error): ?>
              <p><?php echo $error ?></p>
            <?php endforeach ?>

          <?php endif ?>

        <?php endif ?>
        <?php if (!$signupAttempt || !$valid): ?>
          <form id='signup' method='post' action='signup.php'> <!-- role="form" -->
            <div class="form-group">
              <label for="inputEmail">Email address</label>
              <input type="email" class="form-control" id="inputEmail" name="inputEmail" 
                     placeholder="<?php echo (array_key_exists('inputEmail', $postData)) ? $postData['inputEmail'] : 'Enter email' ?>">
            </div>
            <div class="form-group">
              <label for="firstname">Firstname</label>
              <input type="text" class="form-control" id="firstname" name="firstname" 
                     placeholder="<?php echo (array_key_exists('firstname', $postData)) ? $postData['firstname'] : 'firstname' ?>">
              <label for="lastname">Lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" 
                     placeholder="<?php echo (array_key_exists('lastname', $postData)) ? $postData['lastname'] : 'lastname' ?>">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name='agreed' checked> Uncheck this tickbox if you don't want to be bombarded with marketing emails about the latest ascii art crazes
              </label>
            </div>
            <input type="submit" class="btn btn-default" value='Submit' />
          </form>
        <?php endif ?>
      </div>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
