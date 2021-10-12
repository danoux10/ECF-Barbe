<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emprunter</title>
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php 
    include '../include/navbar.php';
  ?>
  
  <div class="flex justify-center mt-9">
    <form action="" method="post" class="w-8/12 mr-9">
      <div class="flex">
        <fieldset class="border border-black w-4/5 grid grid-cols-9 gap-2">
          <legend class="font-bold">Emprunter</legend>
          <?php include '../include/bookLoan.php'; ?>
        </fieldset>
        <?php include'../include/bookLoanAdmin.php'; ?>
      </div>
    </form>
  </div>
</body>
</html>
