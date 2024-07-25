<?php
for ($x = 0; $x < 5; $x++) {
  if (sizeof($demoData) == (($_SESSION['pagination'] - 1) * 5) + $x) {
    break;
  }
?>
  <div class="container jobListItem p-3 mt-3 border border-light-subtle">
    <div class="container row m-0">
      <div class="col-2">
        <img src="" width="100" height="100" class="border radius">
      </div>
      <div class="container col-12 col-lg-8 m-0">
        <h4><?php echo $demoData[(($_SESSION['pagination'] - 1) * 5) + $x][0] ?></h4>
        <div class="row mt-4">
          <h6 class="col"><?php echo $demoData[(($_SESSION['pagination'] - 1) * 5) + $x][1] ?></h6>
          <h6 class="col"><?php echo $demoData[(($_SESSION['pagination'] - 1) * 5) + $x][2] ?></h6>
          <h6 class="col"><?php echo $demoData[(($_SESSION['pagination'] - 1) * 5) + $x][3] ?></h6>
        </div>
      </div>
      <div class="col-lg-2 h-100">
        <form action="apply.php" method="post">
          <button type="submit" class="btn btn-dark mb-3" name="applyButton" value="apply<?php echo $demoData[(($_SESSION['pagination'] - 1) * 5) + $x][5] ?>">Apply</button>
        </form>
        <h6 class="text-secondary"><?php echo $demoData[(($_SESSION['pagination'] - 1) * 5) + $x][4] ?></h6>
      </div>
    </div>
  </div>
<?php
} ?>
