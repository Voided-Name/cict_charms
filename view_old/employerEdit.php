<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <style type="text/css">
    .table-responsive {
      max-height: 300px;
    }
  </style>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
  <script>
    async function refreshManageVacancies() {
      const table = document.getElementById("manageVacanciesTable");
      const tbody = document.getElementById("manageVacanciesTbody");
      let newTbody = document.createElement('tbody');

      employerRequest = {
        "context": "refreshManage",
      }

      await fetch("../controller/employerController.php", {
        "method": "POST",
        "headers": {
          "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(employerRequest),
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        data.forEach(function(item, index) {
          const row = newTbody.insertRow();
          row.insertCell(0).textContent = index + 1; // Assuming # is an auto-incrementing index
          row.insertCell(1).textContent = item.position;
          row.insertCell(2).textContent = item.slotAmount;
          row.insertCell(3).textContent = item.jobType;
          row.insertCell(4).textContent = item.location;
          row.insertCell(5).textContent = item.workHours;
        })
      }).catch(error => {
        console.error("Err", error);
      })

      table.replaceChild(newTbody, tbody);
    }
  </script>
</head>

<body onload="">
  <div class="container mt-2">
    <h1>Job Vacancy Form</h1>
    <hr class="border border-primary border-2">
    <form>
      <div class="row">
        <div class="col-3" id="">
          <label for="" class="form-label">Position</label>
          <input type="text" class="form-control" id="" required>
        </div>
        <div class="col-3" id="">
          <label for="" class="form-label">Slot Amount</label>
          <input type="number" class="form-control" id="" required>
        </div>
        <div class="col-3" id="">
          <label for="" class="form-label">Location</label>
          <input type="text" class="form-control" id="" required>
        </div>
        <div class="col-3" id="">
          <label for="" class="form-label">Work Hours (week)</label>
          <input type="number" class="form-control" id="" required>
        </div>
      </div>
      <hr class="border border-secondary border-1">
      <div class="">
        <div class="row" id="">
          <div class="col-1">
            <h2>Salary (Php)</h2>
          </div>
          <div class="col-3">
            <label for="" class="form-label">Min</label>
            <input type="number" class="form-control" id="" required>
          </div>
          <div class="col-3">
            <label for="" class="form-label">Max</label>
            <input type="number" class="form-control" id="" required>
          </div>
        </div>
      </div>
      <hr class="border border-secondary border-2">
      <div class="container p-0 ">
        <span class="input-group-text fw-bold">Details</span>
        <textarea class="form-control" rows="15"></textarea>
      </div>
      <div class="container row mt-2 justify-content-between">
        <div class="col-2 p-0">
          <button class="btn btn-secondary w-100" type="button" onclick="history.back()">Back</button>
        </div>
        <div class="col-2 p-0">
          <button class="btn btn-primary w-100" type="submit">Submit form</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>
