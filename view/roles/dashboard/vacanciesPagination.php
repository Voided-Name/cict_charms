<?php


if ($_SESSION['paginationNum'] == 0) {
  $prevState = false;
} else {
  $prevState = true;
}

$a = ($_SESSION['paginationNum'] * 3) + 1;
$b = $a + 1;
$c = $a + 2;

$bState = (sizeof($demoData) > $a * 5) ? true : false;
$cState = (sizeof($demoData) > $b * 5) ? true : false;

$aActive = ($_SESSION['pagination'] == $a) ? true : false;
$bActive = ($_SESSION['pagination'] == $b) ? true : false;
$cActive = ($_SESSION['pagination'] == $c) ? true : false;

?>


<form method="POST" action="vacancies.php">
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3">
      <li class="page-item">
        <?php if ($prevState) {
        ?>
          <button type="submit" class="page-link" href="#" name="page" value="previous">Previous</a>
          <?php
        } else {
          ?>
            <button type="submit" class="page-link bg-light" href="#" name="page" value="previous" disabled>Previous</a>
            <?php
          }
            ?>
      </li>
      <li class="page-item <?php echo ($aActive) ? 'active' : '' ?>">
        <button type="submit" class="page-link" name="page" value="<?php echo $a ?>"><?php echo $a ?></button>
      </li>
      <li class="page-item <?php echo ($bActive) ? 'active' : '' ?>">
        <button type="submit" class="page-link <?php echo ($bState) ? "" : "bg-light" ?>" name="page" value="<?php echo $b . '" ';
                                                                                                              echo ($bState) ? "" : "disabled" ?>><?php echo $b ?></button>
      </li>
      <li class=" page-item <?php echo ($cActive) ? 'active' : '' ?>">
          <button type="submit" class="page-link <?php echo ($cState) ? "" : "bg-light" ?>" name="page" value="<?php echo $c . '" ';
                                                                                                                echo ($cState) ? "" : "disabled" ?>><?php echo $c ?></button>
      </li>
      <li class=" page-item">
      </li>
      <li class="page-item">
        <?php if ($nextState) {
        ?>
          <button type="submit" name="page" class="page-link" value="next">Next</button>
        <?php
        } else {
        ?>
          <button type="submit" name="page" class="page-link bg-light" value="next" disabled>Next</button>
        <?php
        }
        ?>
      </li>
    </ul>
  </nav>
</form>
