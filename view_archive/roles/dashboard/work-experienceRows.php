<?php

if (!isset($_SESSION['workExpData'])) {
  $_SESSION['workExpData'] = array(
    array("Excellence in Software Development", "2024-01-15", "NEUST", "This award recognizes outstanding achievement and excellence in the field of software development. It acknowledges the recipient's exceptional skills, innovative contributions, and impact in the software industry."),
    array("Academic Excellence Award", "2024-02-14", "NEUST", "Given to students who have demonstrated exceptional academic performance and a strong commitment to their studies. This award highlights the recipient's dedication, hard work, and outstanding achievements in their academic pursuits."),
    array("Outstanding Capstone Project", "2023-12-24", "NEUST", "Recognizes the outstanding capstone project completed by a student or a team of students. This award celebrates the innovative thinking, practical application of knowledge, and the significant impact of the project on the field of study or the wider community."),
  );
}

$_SESSION['awardData'] = array_values($_SESSION['awardData']);
for ($x = 0; $x < sizeof($_SESSION['awardData']); $x++) {
?>
  <tr>
    <td><?php echo $_SESSION['awardData'][$x][0] ?></td>
    <td><?php echo date("F j, Y", strtotime($_SESSION['awardData'][$x][1])); ?></td>
    <td><?php echo $_SESSION['awardData'][$x][2] ?></td>
    <td>
      <div class="flex align-items-center list-user-action">
        <!-- Edit Button -->
        <a class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#awardEditModal<?php echo $x ?>" data-bs-placement="top" title="Add" href="#">
          <div class="bd-example">
            <button type="button" class="btn btn-success btn-sm">Edit</button>
          </div>
        </a>

        <!-- Modal Structure -->
        <div class="modal fade" id="awardEditModal<?php echo $x ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Award Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="editAward.php">
                  <label for="award-name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="award-name" id="award-name" placeholder="Award Name" value="<?php echo $_SESSION['awardData'][$x][0] ?>">
                  <label for="award-date" class="form-label">Award Date</label>
                  <input type="date" class="form-control" name="award-date" id="award-date" value="<?php echo $_SESSION['awardData'][$x][1] ?>">
                  <label for="award-institution" class="form-label">Institution</label>
                  <input type="text" class="form-control" name="award-institution" id="award-institution" value="<?php echo $_SESSION['awardData'][$x][2] ?>">
                  <label for="award-description" class="form-label">Description</label>
                  <textarea class="form-control" name="award-description" id="award-description" value=""><?php echo $_SESSION['awardData'][$x][3] ?></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="showEditAlert()" value="<?php echo $x ?>" name="index">Save
                  changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <a class=" btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#">
          <span class="btn-inner">
            <div class="bd-example">
              <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteAlert(event)" name="delete" value="<?php echo $x ?>"> Delete</button>
            </div>
          </span>
        </a>
      </div>
    </td>
  </tr>
  <tr>
  <?php
}
  ?>
