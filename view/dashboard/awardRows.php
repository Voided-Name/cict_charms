<?php

/**
 * @var func $func
 */
$alumniAwardsData = $func->selectall_where('alumni_awards', array('alumni_userID', '=', $_SESSION['userid']));

var_dump($alumniAwardsData);

$x = 0;
foreach ($alumniAwardsData as $alumniAwardInstance) {
?>
  <tr>
    <td><?php echo $alumniAwardInstance['award_name'] ?></td>
    <td><?php echo date("F j, Y", strtotime($alumniAwardInstance['award_date'])); ?></td>
    <td><?php echo $alumniAwardInstance['given_by'] ?></td>
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
                <form method="POST">
                  <label for="award-name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="award-name" id="award-name" placeholder="Award Name" value="<?php echo $alumniAwardInstance['award_name'] ?>">
                  <label for="award-date" class="form-label">Award Date</label>
                  <input type="date" class="form-control" name="award-date" id="award-date" value="<?php echo $alumniAwardInstance['award_date'] ?>">
                  <label for="award-institution" class="form-label">Institution</label>
                  <input type="text" class="form-control" name="award-institution" id="award-institution" value="<?php echo $alumniAwardInstance['given_by'] ?>">
                  <label for="award-description" class="form-label">Description</label>
                  <textarea class="form-control" name="award-description" id="award-description" value=""><?php echo $alumniAwardInstance['award_description'] ?></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="<?php echo $alumniAwardInstance['id'] ?>" name="editAward">Save
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
  $x++;
}
  ?>
