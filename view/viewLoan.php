<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emprunter</title>
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../image/book.svg" type="image/x-icon">

</head>
<body>
  <?php 
    include '../include/navbar.php';
  ?>
  
  <div class="flex justify-center mt-9">
    <form action="" method="post" class="w-8/12 mr-9">
      <div class="flex lg:flex-row md:flex-col">
        <fieldset class="border border-black lg:w-4/5 md:w-full ">
          <legend class="font-bold">Emprunter</legend>
          <div class="grid lg:grid-cols-10 lg:gap-3 md:grid-cols-5 md:gap-1">
            <?php include '../include/bookLoan.php'; ?>
          </div>
        </fieldset>
        <?php include'../include/bookLoanAdmin.php'; ?>
      </div>
    </form>
  </div>
</body>
</html>
