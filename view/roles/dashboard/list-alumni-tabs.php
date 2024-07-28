<?php
// TODO currently mock data, to update to match how the back end retrieves data
$alumnis = array(
  array("naeberber@gmail.com", "09123456789", "Nash Andre",  "E.", "Berber", "Cabu, Cabanatuan City", "06/25/2004", "123456789", "Database Systems Technology", "BSIT", "2019", "Sumacab", "2015"),
  array("yno@gmail.com", "09215218528", "Yno", "ME.", "Reyes", "Cabu", "mm/dd/yyyy", "SUM126-356", "Web Systems Technology", "BSIT", "2020", "Sumacab", "2016"),
  array("leon@gmail.com", "09215218528", "Leon", "ME.", "Laborina", "Cabu", "mm/dd/yyyy", "SUM126-2556", "Networking Systems Technology", "BSIT", "2021", "Sumacab", "2017"),
);

$abbrev = [
  "BSIT" => "Bachelor of Science in Information and Technology",
  "BSArch" => "Bachelor of Science in Architecture",
  "BSCrim" => "Bachelor of Science in Criminology",
  "BEE" => "Bachelor of Elementary Education",
  "BPE" => "Bachelor of Physical Education",
  "BSEduc" => "Bachelor of Secondary Education",
  "BTLE" => "Bachelor of Technology and Livelihood Education",
  "BSIE" => "Bachelor of Science in Industrial Education",
  "BSPE" => "Bachelor of Science in Physical Education",
  "BSCE" => "Bachelor of Science in Civil Engineering",
  "BSEE" => "Bachelor of Science in Electrical Engineering",
  "BSME" => "Bachelor of Science in Mechanical Engineering",
  "BSBA" => "Bachelor of Science in Business Administration",
  "BSEntrep" => "Bachelor of Science in Entrepreneurship",
  "BSHM" => "Bachelor of Science in Hospitality and Management",
  "BSHRM" => "Bachelor of Science in Hotel and Restaurant Management",
  "BSTM" => "Bachelor of Science in Tourism Management",
  "BPA" => "Bachelor of Public Administration",
];
?>

<div class="card-header d-flex justify-content-between">
    <div class="header-title">
        <h4 class="card-title">Alumni List</h4>
    </div>
</div>
<div class="card-body px-0">
    <div class="table-responsive">
        <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
            <thead>
                <tr class="light">
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Campus</th>
                    <th>Year Graduated</th>
                    <th>Course</th>
                    <th style="min-width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($x = 0; $x < sizeof($alumnis); $x++) {
                    echo "<tr id='row-$x'>";
                    echo "  <td id='name-$x'>" . $alumnis[$x][2] . " " . $alumnis[$x][4]  . "</td>";
                    echo "  <td id='contact-$x'>" . $alumnis[$x][1] . "</td>";
                    echo "  <td id='email-$x'>" . $alumnis[$x][0] . "</td>";
                    echo "  <td id='campus-$x'>" . "Sumacab" . "</td>"; // TODO change to how the back end retrieves the data 
                    echo "  <td id='year-graduated-$x'>" .  $alumnis[$x][10] . "</td>";
                    echo "  <td id='course-$x'>" .  "BSIT" . "</td>"; // TODO change to how the back end retrieves the data
                    echo "  <td>";
                    echo "    <div class='flex align-items-center list-user-action'>";
                    echo "      <!-- View Button -->";
                    echo "      <a class='btn btn-sm btn-icon' data-bs-toggle='modal' data-bs-target='#myModal$x' data-bs-placement='top' title='View' href='#'>";
                    echo "        <div class='bd-example'>";
                    echo "          <button type='button' class='btn btn-success btn-sm'>View</button>";
                    echo "        </div>";
                    echo "      </a>";
                    echo "      <!-- Edit Button -->";
                    echo "      <a class='btn btn-sm btn-icon' data-bs-toggle='modal' data-bs-target='#myModalEdit$x' data-bs-placement='top' title='Edit' href='#'>";
                    echo "        <div class='bd-example'>";
                    echo "          <button type='button' class='btn btn-primary btn-sm'>Edit</button>";
                    echo "        </div>";
                    echo "      </a>";
                    echo "    </div>";
                    echo "  </td>";
                    echo "</tr>";
                ?>
                <!-- View Modal -->
                <div class="modal fade" id="myModal<?php echo $x; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Validate Alumni Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="font-size: 20px; color:black">
                                <div class="alumni-details">
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>First Name:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][2]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Middle Name:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][3]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Last Name:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][4]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Year Graduated:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][10]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Year Enrolled:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][12]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Campus:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][11]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Course:</strong></div>
                                        <div class="col-md-8"><?php echo $abbrev[$alumnis[$x][9]]; ?></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4"><strong>Alumni Number:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][7]; ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4"><strong>Email:</strong></div>
                                        <div class="col-md-8"><?php echo $alumnis[$x][0]; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="myModalEdit<?php echo $x; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Alumni Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="font-size: 20px; color:black">
                                <form id="editForm<?php echo $x; ?>">
                                    <div class="mb-3">
                                        <label for="editFirstName<?php echo $x; ?>" class="form-label">First
                                            Name</label>
                                        <input type="text" class="form-control" id="editFirstName<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][2]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editMiddleName<?php echo $x; ?>" class="form-label">Middle
                                            Name</label>
                                        <input type="text" class="form-control" id="editMiddleName<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][3]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editLastName<?php echo $x; ?>" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="editLastName<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][4]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editYearGraduated<?php echo $x; ?>" class="form-label">Year
                                            Graduated</label>
                                        <input type="text" class="form-control" id="editYearGraduated<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][10]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editYearEnrolled<?php echo $x; ?>" class="form-label">Year
                                            Enrolled</label>
                                        <input type="text" class="form-control" id="editYearEnrolled<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][12]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editCampus<?php echo $x; ?>" class="form-label">Campus</label>
                                        <input type="text" class="form-control" id="editCampus<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][11]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editCourse<?php echo $x; ?>" class="form-label">Course</label>
                                        <input type="text" class="form-control" id="editCourse<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][9]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editMajor<?php echo $x; ?>" class="form-label">Major</label>
                                        <input type="text" class="form-control" id="editMajor<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][8]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAlumniNumber<?php echo $x; ?>" class="form-label">Alumni
                                            Number</label>
                                        <input type="text" class="form-control" id="editAlumniNumber<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][7]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editEmail<?php echo $x; ?>" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="editEmail<?php echo $x; ?>"
                                            value="<?php echo $alumnis[$x][0]; ?>">
                                    </div>
                                    <button type="button" class="btn btn-primary save-changes"
                                        data-id="<?php echo $x; ?>">Save changes</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?php echo $x ?>" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Decline
                                    <?php echo $alumnis[$x][2] ?>'s Registration</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating">
                                    <h5 class="text-secondary m-2">Reason for Declining</h5>
                                    <textarea style="height: 100px" class="form-control text-secondary"
                                        id="floatingTextarea"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" data-bs-target="#myModal<?php echo $x; ?>"
                                    data-bs-toggle="modal">Back to Details</button>
                                <button type="button" class="btn btn-danger delButton" id=""
                                    data-bs-dismiss="modal">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.save-changes').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const firstName = document.getElementById('editFirstName' + id).value;
            const middleName = document.getElementById('editMiddleName' + id).value;
            const lastName = document.getElementById('editLastName' + id).value;
            const yearGraduated = document.getElementById('editYearGraduated' + id).value;
            const yearEnrolled = document.getElementById('editYearEnrolled' + id).value;
            const campus = document.getElementById('editCampus' + id).value;
            const course = document.getElementById('editCourse' + id).value;
            const major = document.getElementById('editMajor' + id).value;
            const alumniNumber = document.getElementById('editAlumniNumber' + id).value;
            const email = document.getElementById('editEmail' + id).value;

            // Update the table row with new values
            document.getElementById('name-' + id).innerText = firstName + ' ' + lastName;
            document.getElementById('email-' + id).innerText = email;
            document.getElementById('campus-' + id).innerText = campus;
            document.getElementById('year-graduated-' + id).innerText = yearGraduated;
            document.getElementById('course-' + id).innerText = course;

            var modal = document.getElementById('myModalEdit' + id);
            var bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide();
        });
    });
});
</script>