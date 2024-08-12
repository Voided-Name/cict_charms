<?php
require_once("db.php");
class res
{
  private $class_var;

  function __construct()
  {
    global $con;
    $this->class_var = $con;
  }

  //select  join
  function selectjoin($table, $table2, $ref, $ref2)
  {
    global $con;
    $list = array();

    $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2}";


    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  //select join sample
  /*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/


  //select  distinct
  function selectdistinct_joinorderby($distincttbl, $distinctval, $table, $ref, $table2, $ref2, $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();

    $sql = "SELECT DISTINCT {$distincttbl}.{$distinctval} FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} ORDER BY {$tableref}.{$col} {$sortorder} ";


    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  //select join sample
  /*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/

  function select_count_where($table, $field, $operator, $value)
  {
    global $con;

    $sql = "SELECT COUNT(*) AS total FROM {$table} WHERE {$field} {$operator} {$value}";
    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      $res = $qry->fetch_assoc();

      return $res['total'];
    }
    return null;
  }

  function select_count_where2($table, $field, $operator, $value, $field2, $operator2, $value2)
  {
    global $con;

    $sql = "SELECT COUNT(*) AS total FROM {$table} WHERE {$field} {$operator} {$value} AND {$field2} {$operator2} {$value2}";
    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      $res = $qry->fetch_assoc();

      return $res['total'];
    }
    return null;
  }




  //select  joinlike
  function selectjoin_like($table, $table2, $ref, $ref2, $tblorder, $byfield, $likestr, $where = array())
  {
    global $con;
    $list = array();

    $likeval = '%' . $likestr . '%';

    if (count($where) === 2) {

      $tbl1  = $where[0];
      $field1 = $where[1];


      $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1} LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield}";
    } else if (count($where) === 4) {
      $tbl1  = $where[0];
      $field1 = $where[1];
      $tbl2  = $where[3];
      $field2 = $where[4];


      $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1}  LIKE '{$likeval}' OR {$tbl2}.{$field2}  LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield}";
    }

    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  //select join sample
  /*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/


  //select  joinlike 
  function selectjoin_likelimit($table, $table2, $ref, $ref2, $tblorder, $byfield, $likestr, $sortorder, $start, $perPage, $where = array())
  {
    global $con;
    $list = array();

    $likeval = '%' . $likestr . '%';

    if (count($where) === 2) {

      $tbl1  = $where[0];
      $field1 = $where[1];


      $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1} LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield} {$sortorder} LIMIT {$start}, {$perPage}";
    } else if (count($where) === 4) {
      $tbl1  = $where[0];
      $field1 = $where[1];
      $tbl2  = $where[2];
      $field2 = $where[3];


      $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1}  LIKE '{$likeval}' OR {$tbl2}.{$field2}  LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield} {$sortorder} LIMIT {$start}, {$perPage}";
    }




    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  //select join sample
  /*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/




  function selectjoinorderby($table, $table2, $ref, $ref2, $tableref, $col, $sortorder, $start, $perPage)
  {

    global $con;
    $list = array();


    $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} ORDER BY {$tableref}.{$col} {$sortorder} LIMIT {$start}, {$perPage}";

    //echo $sql;

    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);



    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectjoinorderby('person',mngt_memberslist,'person','pid','person','lastname','start','perpage');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  //select join order no limit
  function selectjoinorderby_nolimit($table, $table2, $ref, $ref2, $tableref, $col, $sortorder)
  {

    global $con;
    $list = array();


    $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} ORDER BY {$tableref}.{$col} {$sortorder}";

    //echo $sql;

    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);



    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectjoinorderby('person',mngt_memberslist,'person','pid','person','lastname','start','perpage');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  //select  join with orderby
  function selectjoinorderby2($table, $table2, $ref, $ref2)
  {
    global $con;
    $list = array();

    $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2}";


    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }


  //select join sample
  /*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/

  function selectjoin_where($table, $table2, $ref, $ref2, $table3, $where = array())
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}'";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }


  function selectjoin_where_orderby($table, $table2, $ref, $ref2, $table3, $where = array(), $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' ORDER BY {$tableref}.{$col} {$sortorder} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }




  // two where order
  function selectjoin_where2_orderby($table, $table2, $ref, $ref2, $table3, $table4, $where = array(), $logic, $where2 = array(), $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3 && count($where2)) {
      $operators = array('=', '>', '<', '>=', '<=', '<>');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' {$logic} {$table4}.{$field2} {$operator2} '{$value2}'  ORDER BY {$tableref}.{$col} {$sortorder} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }



  //three where order by
  function selectjoin_where3_orderby($table, $table2, $ref, $ref2, $table3, $table4, $table5, $where = array(), $logic, $where2 = array(), $logic2, $where3 = array(), $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();



    $field    = $where[0];
    $operator   = $where[1];
    $value     = $where[2];
    $field2    = $where2[0];
    $operator2   = $where2[1];
    $value2    = $where2[2];
    $field3    = $where3[0];
    $operator3   = $where3[1];
    $value3    = $where3[2];


    $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' {$logic} {$table4}.{$field2} {$operator2} '{$value2}' {$logic2} {$table5}.{$field3} {$operator3} '{$value3}'  ORDER BY {$tableref}.{$col} {$sortorder} ";


    $qry = $con->query($sql);


    $rowcount = mysqli_num_rows($qry);


    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }






  //two where woth limit
  function selectjoin_where2_orderbylimit($table, $table2, $ref, $ref2, $table3, $table4, $where = array(), $logic, $where2 = array(), $tableref, $col, $sortorder, $start, $perPage)
  {
    global $con;
    $list = array();

    if (count($where) === 3 && count($where2)) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' {$logic} {$table4}.{$field2} {$operator2} '{$value2}'  ORDER BY {$tableref}.{$col} {$sortorder} LIMIT {$start}, {$perPage} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }




  function selectjoin_where_orderbylimit($table, $table2, $ref, $ref2, $table3, $where = array(), $tableref, $col, $sortorder, $start, $perPage)
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' ORDER BY {$tableref}.{$col} {$sortorder} LIMIT {$start}, {$perPage} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }






  function selectjoin_where_orderby_RAND($table, $table2, $ref, $ref2, $table3, $where = array())
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' ORDER BY RAND() ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  function selectjoin3_where($table, $table2, $table3, $ref, $ref2, $ref3, $ref4, $tableref, $where = array())
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} JOIN {$table3} ON {$table2}.{$ref3}={$table3}.{$ref4} WHERE {$tableref}.{$field} {$operator} '{$value}'";

        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }

        return $sql;
      }
    }
  }

  function selectLeftjoin3_where($table, $table2, $table3, $ref, $ref2, $ref3, $ref4, $tableref, $where = array())
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} LEFT JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3}={$table3}.{$ref4} WHERE {$tableref}.{$field} {$operator} '{$value}'";

        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }

        return $sql;
      }
    }
  }





  // two where order two joins
  function selectjoin3_where2_orderby($table, $table2, $table3, $ref, $ref2, $ref3, $ref4, $tableref, $tableref2, $where = array(), $logic, $where2 = array(), $tableorder, $col, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3 && count($where2)) {
      $operators = array('=', '>', '<', '>=', '<=', '<>');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];


      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} JOIN {$table3} ON {$table2}.{$ref3}={$table3}.{$ref4} WHERE {$tableref}.{$field} {$operator} '{$value}' {$logic} {$tableref2}.{$field2} {$operator2} '{$value2}'  ORDER BY {$tableorder}.{$col} {$sortorder} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  function selectleftjoin4($table, $table2, $table3, $table4, $ref, $ref2, $ref3, $ref4, $ref5, $ref6, $tableref, $where = array())
  {
    global $con;

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} LEFT JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3}={$table3}.{$ref4} LEFT JOIN {$table4} ON {$table3}.{$ref5}={$table4}.{$ref6} WHERE {$tableref}.{$field} {$operator} '{$value}'";

        return $sql;

        $qry = $con->query($sql);

        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return $sql;
      }
    }
  }


  function selectLeftjoin3_where2_orderby($table, $table2, $table3, $ref, $ref2, $ref3, $ref4, $tableref, $tableref2, $where = array(), $logic, $where2 = array(), $tableorder, $col, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3 && count($where2)) {
      $operators = array('=', '>', '<', '>=', '<=', '<>');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];


      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} LEFT JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3}={$table3}.{$ref4} WHERE {$tableref}.{$field} {$operator} '{$value}' {$logic} {$tableref2}.{$field2} {$operator2} '{$value2}'  ORDER BY {$tableorder}.{$col} {$sortorder} ";

        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return $null;
      }
    }
  }





  //selecting * with 2 logical operator
  function select_logics2($table, $where1 = array(), $logic, $where2 = array(), $logic2, $where3 = array())
  {
    global $con;
    $list = array();



    if (count($where1) === 3 and  count($where2) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field1    = $where1[0];
      $operator1   = $where1[1];
      $value1    = $where1[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];
      $field3    = $where3[0];
      $operator3   = $where3[1];
      $value3    = $where3[2];

      if (in_array($operator1, $operators) and in_array($operator2, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' {$logic2} {$field3} {$operator3} '{$value3}' ";

        $qry = $con->query($sql);

        $rowcount = mysqli_num_rows($qry);

        //echo '<script>alert("'.rowcount.'");</script>';

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            //print_r($row);

            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }


  //selecting * with 2 logical operator
  function select_logic_2groups($table, $where1 = array(), $logic, $where2 = array(), $logic2, $where3 = array(), $logic3, $where4 = array())
  {
    global $con;
    $list = array();




    $field1    = $where1[0];
    $operator1   = $where1[1];
    $value1    = $where1[2];
    $field2    = $where2[0];
    $operator2   = $where2[1];
    $value2    = $where2[2];
    $field3    = $where3[0];
    $operator3   = $where3[1];
    $value3    = $where3[2];
    $field4    = $where4[0];
    $operator4   = $where4[1];
    $value4    = $where4[2];



    $sql = "SELECT * FROM {$table} WHERE ( {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' ) {$logic2} ({$field3} {$operator3} '{$value3}' {$logic3} {$field4} {$operator4} '{$value4}') ";

    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    //echo '<script>alert("'.rowcount.'");</script>';

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        //print_r($row);

        $list[] = $row;
      }
      return $list;
    }
    return null;
  }


  //selecting * with 2 logical operator
  function select_logic_2groups1($table, $where1 = array(), $logic, $where2 = array(), $logic2, $where3 = array())
  {
    global $con;
    $list = array();




    $field1    = $where1[0];
    $operator1   = $where1[1];
    $value1    = $where1[2];
    $field2    = $where2[0];
    $operator2   = $where2[1];
    $value2    = $where2[2];
    $field3    = $where3[0];
    $operator3   = $where3[1];
    $value3    = $where3[2];



    $sql = "SELECT * FROM {$table} WHERE ( {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' ) {$logic2} ({$field3} {$operator3} '{$value3}') ";

    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    //echo '<script>alert("'.rowcount.'");</script>';

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        //print_r($row);

        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  //selecting * with 2 logical operator
  function select_logic_2groups2($table, $where1 = array(), $logic, $where2 = array(), $logic2, $where3 = array(), $logic3, $where4 = array(), $logic4, $where5 = array())
  {
    global $con;
    $list = array();




    $field1    = $where1[0];
    $operator1   = $where1[1];
    $value1    = $where1[2];
    $field2    = $where2[0];
    $operator2   = $where2[1];
    $value2    = $where2[2];
    $field3    = $where3[0];
    $operator3   = $where3[1];
    $value3    = $where3[2];
    $field4    = $where4[0];
    $operator4   = $where4[1];
    $value4    = $where4[2];
    $field5    = $where5[0];
    $operator5   = $where5[1];
    $value5    = $where5[2];



    $sql = "SELECT * FROM {$table} WHERE ( {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' ) {$logic2} ({$field3} {$operator3} '{$value3}' {$logic3} {$field4} {$operator4} '{$value4}') {$logic4} {$field5} {$operator5} '{$value5}' ";

    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);

    //echo '<script>alert("'.rowcount.'");</script>';

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        //print_r($row);

        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  //selecting * with logical operator and sorting
  function select_logic_orderby($table, $where1 = array(), $logic, $where2 = array(), $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();



    if (count($where1) === 3 and  count($where2) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field1    = $where1[0];
      $operator1   = $where1[1];
      $value1    = $where1[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];

      if (in_array($operator1, $operators) and in_array($operator2, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}'  ORDER BY {$tableref}.{$col} {$sortorder}  ";

        $qry = $con->query($sql);

        $rowcount = mysqli_num_rows($qry);

        //echo '<script>alert("'.rowcount.'");</script>';

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            //print_r($row);

            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*sample procedure select_logic row
		$cemail = $func->select_logic('users',array('username','=','alex'),'AND',array('name','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/



  //selecting * with logical operator and sorting and limit
  function select_logic_orderbylimit($table, $where1 = array(), $logic, $where2 = array(), $tableref, $col, $sortorder, $start, $perPage)
  {
    global $con;
    $list = array();



    if (count($where1) === 3 and  count($where2) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field1    = $where1[0];
      $operator1   = $where1[1];
      $value1    = $where1[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];

      if (in_array($operator1, $operators) and in_array($operator2, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}'  ORDER BY {$tableref}.{$col} {$sortorder} LIMIT {$start}, {$perPage} ";

        $qry = $con->query($sql);

        $rowcount = mysqli_num_rows($qry);

        //echo '<script>alert("'.rowcount.'");</script>';

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            //print_r($row);

            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*sample procedure select_logic row
		$cemail = $func->select_logic('users',array('username','=','alex'),'AND',array('name','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/


  //selecting * with logical operator
  function select_logic($table, $where1 = array(), $logic, $where2 = array())
  {
    global $con;
    $list = array();



    if (count($where1) === 3 and  count($where2) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field1    = $where1[0];
      $operator1   = $where1[1];
      $value1    = $where1[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];

      if (in_array($operator1, $operators) and in_array($operator2, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' ";

        $qry = $con->query($sql);

        $rowcount = mysqli_num_rows($qry);

        //echo '<script>alert("'.rowcount.'");</script>';

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            //print_r($row);

            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*sample procedure select_logic row
		$cemail = $func->select_logic('users',array('username','=','alex'),'AND',array('name','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/

  //selecting * with where parameters
  function select_one($table, $where = array())
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}'";

        $qry = $con->query($sql);
        $rowcount = mysqli_num_rows($qry);

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*sample procedure select_one row
		
				$cemail = $func->select_one('users',array('username','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/

  //selecting * with where parameters
  function select_one_orderby($table, $where = array(), $orderfield, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}' ORDER BY {$orderfield}  {$sortorder}  ";

        $qry = $con->query($sql);
        $rowcount = mysqli_num_rows($qry);

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*sample procedure select_one row
		
				$cemail = $func->select_one('users',array('username','=','alex'),'date','DESC');
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/


  //selecting * with where parameters
  function select_one_orderbylimit($table, $where = array(), $orderfield, $sortorder, $start, $perPage)
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}' ORDER BY {$orderfield}  {$sortorder} LIMIT {$start}, {$perPage}";

        $qry = $con->query($sql);
        $rowcount = mysqli_num_rows($qry);

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*sample procedure select_one row
		
				$cemail = $func->select_one('users',array('username','=','alex'),'date','DESC');
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/






  //selecting * with where  Like parameters
  function select_like($table, $where = array())
  {
    global $con;
    $list = array();


    if (count($where) === 3) {


      $field    = $where[0];
      $field2   = $where[1];
      $value   = $where[2];
      $valued = '%' . $value . '%';


      $sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%'";
    } else if (count($where) === 4) {


      $field    = $where[0];
      $field2   = $where[1];
      $field3   = $where[2];
      $value   = $where[3];
      $valued = '%' . $value . '%';



      $sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%' OR {$field3} LIKE '%{$valued}%'";
    } else if (count($where) === 5) {


      $field    = $where[0];
      $field2   = $where[1];
      $field3   = $where[2];
      $value   = $where[3];
      $sortorder   = $where[4];
      $valued = '%' . $value . '%';


      $sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%' OR {$field3} LIKE '%{$value}%' ORDER BY {$field} {$sortorder} ";
    }




    $qry = $con->query($sql);
    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }


  //select likes
  function select_likes_sorted($table, $where = array(), $sortby, $sortorder)
  {
    global $con;
    $list = array();

    $wheretext = null;

    //	$v = null;
    //	$c = null;

    $c = array(1, 4, 7, 10, 13, 16);
    $k = array(2, 5, 8, 11, 14, 17);
    $l = array(3, 6, 9, 12, 15, 18);

    for ($x = 0; $x < count($where); $x++) {
      $f = null;


      $n = $x + 1;
      if (in_array($n, $c)) {
        $f = $where[$x] . " LIKE ";
      }


      if (in_array($n, $k)) {
        $f = " '%" . $where[$x] . "%'";
      }


      if (in_array($n, $l)) {
        $f = " " . $where[$x] . " ";
      }

      $wheretext .= $f;
    }


    //


    $sql = "SELECT * FROM {$table} WHERE {$wheretext} ORDER BY {$sortby} {$sortorder} ";


    //return $wheretext;



    $qry = $con->query($sql);
    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }



  /*sample procedure select_like row
		
				$cemail = $func->select_one('users',array('fname','lname','mname','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/



  //selecting * with where  Like parameters
  function select_likelimit($table, $orderfield, $sortorder, $start, $perPage, $where = array())
  {
    global $con;
    $list = array();


    if (count($where) === 3) {

      $field    = $where[0];
      $field2   = $where[1];
      $value   = $where[2];
      $valued = '%' . $value . '%';



      $sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%'  ORDER BY {$orderfield} {$sortorder} LIMIT {$start}, {$perPage}";
    } else if (count($where) === 4) {


      $field    = $where[0];
      $field2   = $where[1];
      $field3   = $where[2];
      $value   = $where[3];
      $valued = '%' . $value . '%';




      $sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%' OR {$field3} LIKE '%{$value}%' ORDER BY {$orderfield} {$sortorder} LIMIT {$start}, {$perPage}";
    }

    $qry = $con->query($sql);
    $rowcount = mysqli_num_rows($qry);

    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }

  /*sample procedure select_like row
		
				$cemail = $func->select_one('users',array('fname','lname','mname','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/



  //generic select * function
  function selectall($table)
  {
    global $con;

    $list = array();
    $sql = "SELECT * FROM {$table}";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/

  function selectall_offset_limit($table, $offset, $limit)
  {
    global $con;
    $list = array();
    $sql = "SELECT * FROM {$table} LIMIT {$limit} OFFSET {$offset}";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  function selectall_join3($table1, $table2, $table3, $ref1, $ref2, $ref3, $ref4)
  {
    global $con;
    $list = array();
    $sql = "SELECT * FROM {$table1} LEFT JOIN {$table2} ON {$table1}.{$ref1} = {$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3} = {$table3}.{$ref4}";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  function selectall_join3_offset_limit($table1, $table2, $table3, $ref1, $ref2, $ref3, $ref4, $offset, $limit)
  {
    global $con;
    $list = array();
    $sql = "SELECT * FROM {$table1} LEFT JOIN {$table2} ON {$table1}.{$ref1} = {$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3} = {$table3}.{$ref4} LIMIT {$limit} OFFSET {$offset}";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  function vacancy_filters($table1, $table2, $table3, $ref1, $ref2, $ref3, $ref4, $offset, $limit, $locationFilters = array(), $jobTypeFilters = array(), $shiftFilter, $educFilter)
  {
    global $con;
    $list = array();

    $locationFiltersSql = "";

    $args = 0;

    if ($locationFilters) {
      if ($locationFilters[0] != '') {
        if ($args == 0) {
          $locationFiltersSql .= "WHERE employer_job_posts.job_region = " . $locationFilters[0];
          $args = 1;
        } else {
          $locationFiltersSql .= " AND employer_job_posts.job_region = " . $locationFilters[0];
        }
      }
      if ($locationFilters[1] != '') {
        if ($args == 0) {
          $locationFiltersSql .= "WHERE employer_job_posts.job_province= '" . $locationFilters[1] . "'";
          $args = 1;
        }
        $locationFiltersSql .= " AND employer_job_posts.job_province= '" . $locationFilters[1] . "'";
      }
      if ($locationFilters[2] != '') {
        if ($args == 0) {
          $locationFiltersSql .= "WHERE employer_job_posts.job_municipality= '" . $locationFilters[2] . "'";
          $args = 1;
        } else {
          $locationFiltersSql .= "AND employer_job_posts.job_municipality = '" . $locationFilters[2] . "'";
        }
      }
      if ($locationFilters[3] != '') {
        if ($args == 0) {
          $locationFiltersSql .= "WHERE employer_job_posts.job_barangay = '" . $locationFilters[3] . "'";
          $args = 1;
        }
        $locationFiltersSql .= " AND employer_job_posts.job_barangay = '" . $locationFilters[3] . "'";
      }
    }

    if ($jobTypeFilters) {
      if (in_array('fullTime', $jobTypeFilters)) {
        if ($args == 0) {
          $jobTypeFiltersSql .= "WHERE employer_job_posts.job_type LIKE '" . "1_____'";
          $args = 1;
        } else {
          $jobTypeFiltersSql .= " AND employer_job_posts.job_type LIKE '" . "1_____";
        }
      }
      if (in_array('partTime', $jobTypeFilters)) {
        if ($args == 0) {
          $jobTypeFiltersSql .= "WHERE employer_job_posts.job_type LIKE '" . "_1____'";
          $args = 1;
        } else {
          $jobTypeFiltersSql .= " AND employer_job_posts.job_type LIKE '" . "_1____";
        }
      }
      if (in_array('contract', $jobTypeFilters)) {
        if ($args == 0) {
          $jobTypeFiltersSql .= "WHERE employer_job_posts.job_type LIKE '" . "__1___'";
          $args = 1;
        } else {
          $jobTypeFiltersSql .= " AND employer_job_posts.job_type LIKE '" . "__1___";
        }
      }
      if (in_array('temporary', $jobTypeFilters)) {
        if ($args == 0) {
          $jobTypeFiltersSql .= "WHERE employer_job_posts.job_type LIKE '" . "___1__'";
          $args = 1;
        } else {
          $jobTypeFiltersSql .= " AND employer_job_posts.job_type LIKE '" . "___1__";
        }
      }
      if (in_array('remote', $jobTypeFilters)) {
        if ($args == 0) {
          $jobTypeFiltersSql .= "WHERE employer_job_posts.job_type LIKE '" . "____1_'";
          $args = 1;
        } else {
          $jobTypeFiltersSql .= " AND employer_job_posts.job_type LIKE '" . "____1_";
        }
      }
      if (in_array('freelance', $jobTypeFilters)) {
        if ($args == 0) {
          $jobTypeFiltersSql .= "WHERE employer_job_posts.job_type LIKE '" . "_____1'";
          $args = 1;
        } else {
          $jobTypeFiltersSql .= " AND employer_job_posts.job_type LIKE '" . "_____1";
        }
      }
    }

    $shiftFilterSql = '';

    if ($shiftFilter) {
      switch ($shiftFilter) {
        case '1':
          if ($args == 0) {
            $shiftFilterSql .= 'WHERE employer_job_posts.job_shift = 1';
            $args = 1;
          } else {
            $shiftFilterSql .= ' AND employer_job_posts.job_shift = 1';
          }
          break;
        case '2':
          if ($args == 0) {
            $shiftFilterSql .= 'WHERE employer_job_posts.job_shift = 2';
            $args = 1;
          } else {
            $shiftFilterSql .= ' AND employer_job_posts.job_shift = 2';
          }
          break;
        case '3':
          if ($args == 0) {
            $shiftFilterSql .= 'WHERE employer_job_posts.job_shift = 3';
            $args = 1;
          } else {
            $shiftFilterSql .= ' AND employer_job_posts.job_shift = 3';
          }
          break;
        case '4':
          if ($args == 0) {
            $shiftFilterSql .= 'WHERE employer_job_posts.job_shift = 4';
            $args = 1;
          } else {
            $shiftFilterSql .= ' AND employer_job_posts.job_shift = 4';
          }
          break;
        case '5':
          if ($args == 0) {
            $shiftFilterSql .= 'WHERE employer_job_posts.job_shift = 5';
            $args = 1;
          } else {
            $shiftFilterSql .= ' AND employer_job_posts.job_shift = 5';
          }
          break;
      }
    }

    $educFilterSql = '';

    if ($educFilter) {
      switch ($educFilter) {
        case '1':
          if ($args == 0) {
            $educFilterSql .= 'WHERE employer_job_posts.education = 1';
            $args = 1;
          } else {
            $educFilterSql .= ' AND employer_job_posts.education = 1';
          }
          break;
        case '2':
          if ($args == 0) {
            $educFilterSql .= 'WHERE employer_job_posts.education = 2';
            $args = 1;
          } else {
            $educFilterSql .= ' AND employer_job_posts.education = 2';
          }
          break;
        case '3':
          if ($args == 0) {
            $educFilterSql .= 'WHERE employer_job_posts.education = 3';
            $args = 1;
          } else {
            $educFilterSql .= ' AND employer_job_posts.education = 3';
          }
          break;
        case '4':
          if ($args == 0) {
            $educFilterSql .= 'WHERE employer_job_posts.education = 4';
            $args = 1;
          } else {
            $educFilterSql .= ' AND employer_job_posts.education = 4';
          }
          break;
      }
    }


    if ($limit) {
      $sql = "SELECT * FROM {$table1} LEFT JOIN {$table2} ON {$table1}.{$ref1} = {$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3} = {$table3}.{$ref4} {$locationFiltersSql} {$jobTypeFiltersSql} {$shiftFilterSql} {$educFilterSql} LIMIT {$limit} OFFSET {$offset} ";
    } else {
      $sql = "SELECT * FROM {$table1} LEFT JOIN {$table2} ON {$table1}.{$ref1} = {$table2}.{$ref2} LEFT JOIN {$table3} ON {$table2}.{$ref3} = {$table3}.{$ref4} {$locationFiltersSql} {$jobTypeFiltersSql} {$shiftFilterSql} {$educFilterSql}";
    }

    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }



  // select * not in logic
  function selectall_notin_logic($table, $field, $table2, $field2, $logic, $table3, $where = array())
  {
    global $con;

    $list = array();


    if (count($where) === 3) {

      $field3    = $where[0];
      $operator   = $where[1];
      $value   = $where[2];
    }

    $sql = "SELECT * FROM {$table} WHERE {$field} NOT IN (SELECT {$field} FROM {$table2} ) {$logic} {$table3}.{$field3} {$operator} {$value}";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/



  // select * in array
  function selectall_in_array($table, $field, $arr_list, $logic, $where = array(), $logic2, $where2 = array())
  {
    //function selectall_in_array($table,$field,$arr_list,$logic,$where = array()){

    global $con;

    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field2    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
    }

    if (count($where2) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field3    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];
    }


    //	$sql = "SELECT * FROM {$table}  WHERE  {$field} IN ( '" . implode( "', '" , $arr_list ) . "' )  {$logic} {$field2} {$operator} '{$value}' ";

    $sql = "SELECT * FROM {$table}  WHERE  {$field} IN ( '" . implode("', '", $arr_list) . "' ) {$logic} {$field2} {$operator} '{$value}' {$logic2} {$field3} {$operator2} '{$value2}' ";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }


  // select specific item in array  
  function selectall_in_array2($table, $field, $arr_list, $logic, $where = array(), $logic2, $where2 = array(), $tosearch)
  {


    global $con;

    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field2    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
    }

    if (count($where2) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field3    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];
    }


    //	$sql = "SELECT * FROM {$table}  WHERE  {$field} IN ( '" . implode( "', '" , $arr_list ) . "' )  {$logic} {$field2} {$operator} '{$value}' ";

    $sql = "SELECT {$tosearch} FROM {$table}  WHERE  {$field} IN ( '" . implode("', '", $arr_list) . "' ) {$logic} {$field2} {$operator} '{$value}' {$logic2} {$field3} {$operator2} '{$value2}' ";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }


  // select specific item in array  
  //function selectall_in_array_numonly($table,$field,$arr_list){
  function selectall_in_array3($table, $field, $arr_list, $logic, $where = array())
  {


    global $con;

    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field2    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
    }


    //print_r($arr_list);
    //echo gettype($value);

    // if(count($where2) === 3) {
    // $operators = array('=', '>', '<', '>=', '<=');

    // $field3		= $where2[0];
    // $operator2 	= $where2[1];
    // $value2		= $where2[2];
    // }


    //$sql = "SELECT * FROM {$table}  WHERE  {$field} IN ( '" . implode( "', '" , $arr_list ) . "' )  ";

    if (gettype($value) == 'string') {

      $sql = "SELECT * FROM {$table}  WHERE  {$field} IN ( '" . implode("', '", $arr_list) . "' ) {$logic} {$field2} {$operator} '{$value}'  ";
    } else {
      $sql = "SELECT * FROM {$table}  WHERE  {$field}  IN ( '" . implode("', '", $arr_list) . "' )  {$logic} {$field2} {$operator} {$value} AND {$field2} REGEXP '^[0-9€]'  ";
    }

    //	 $sql = "SELECT {$tosearch} FROM {$table}  WHERE  {$field} IN ( '" . implode( "', '" , $arr_list ) . "' ) {$logic} {$field2} {$operator} '{$value}' {$logic2} {$field3} {$operator2} '{$value2}' ";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }



  // select specific item in array  
  //function selectall_in_array_numonly($table,$field,$arr_list){
  function selectall_in_array4($table, $field, $arr_list)
  {


    global $con;

    $list = array();

    // if(count($where) === 3) {
    // $operators = array('=', '>', '<', '>=', '<=');

    // $field2		= $where[0];
    // $operator 	= $where[1];
    // $value 		= $where[2];
    // }


    //print_r($arr_list);
    //echo gettype($value);

    // if(count($where2) === 3) {
    // $operators = array('=', '>', '<', '>=', '<=');

    // $field3		= $where2[0];
    // $operator2 	= $where2[1];
    // $value2		= $where2[2];
    // }



    // if(gettype($value)=='string'){

    $sql = "SELECT * FROM {$table}  WHERE  {$field} IN ( '" . implode("', '", $arr_list) . "' ) ";

    // }else {
    // 		$sql = "SELECT * FROM {$table}  WHERE  {$field}  IN ( '" . implode( "', '" , $arr_list ) . "' )  {$logic} {$field2} {$operator} {$value} AND {$field2} REGEXP '^[0-9€]'  ";

    // }

    //	 $sql = "SELECT {$tosearch} FROM {$table}  WHERE  {$field} IN ( '" . implode( "', '" , $arr_list ) . "' ) {$logic} {$field2} {$operator} '{$value}' {$logic2} {$field3} {$operator2} '{$value2}' ";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }





  // select * not in array
  function selectall_notin_array($table, $field, $arr_list)
  {
    global $con;






    $sql = "SELECT * FROM {$table}  WHERE  {$field} NOT IN ( '" . implode("', '", $arr_list) . "' )";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }



  // select * not in array orderby
  function selectall_notin_array_orderby($table, $field, $arr_list, $byfield, $sortorder)
  {
    global $con;






    $sql = "SELECT * FROM {$table}  WHERE  {$field} NOT IN ( '" . implode("', '", $arr_list) . "' ) ORDER BY {$byfield}  {$sortorder} ";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }


  // select * not in logic
  function selectall_notin_logic2($table, $field, $table2, $field2, $logic, $table3, $where = array(), $logic2, $table4, $where2 = array())
  {
    global $con;

    $list = array();


    if (count($where) === 3) {

      $field3    = $where[0];
      $operator   = $where[1];
      $value   = $where[2];
    }


    if (count($where2) === 3) {

      $field4    = $where2[0];
      $operator2   = $where2[1];
      $value2   = $where2[2];
    }

    $sql = "SELECT * FROM {$table} WHERE {$field} NOT IN (SELECT {$field} FROM {$table2} ) {$logic} {$table3}.{$field3} {$operator} {$value} {$logic2} {$table4}.{$field4} {$operator2} {$value2}";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/



  //generic select * function
  function selectall_where($table, $where = array())
  {
    global $con;

    $list = array();


    if (count($where) === 3) {

      $field    = $where[0];
      $operator   = $where[1];
      $value   = $where[2];
    }

    $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} {$value}";
    $qry = $con->query($sql);

    $rowcount = mysqli_num_rows($qry);


    if ($rowcount != 0) {
      for ($x = 1; $x <= $rowcount; $x++) {
        $row = mysqli_fetch_assoc($qry);
        $list[] = $row;
      }
      return $list;
    }
    return null;
  }

  function selectall_where_orderby($table, $where = array(), $ref, $sortorder)
  {
    global $con;

    $list = array();


    if (count($where) === 3) {

      $field    = $where[0];
      $operator   = $where[1];
      $value   = $where[2];
    }

    $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} {$value} ORDER BY $ref $sortorder";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  //select distinct
  function select_distinct($table, $col_arr = array())
  {
    global $con;

    $list = array();


    if (count($col_arr) === 1) {
      $field  = $col_arr[0];

      $sql = "SELECT DISTINCT {$field} FROM {$table} ";
    }
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  //select distinct in array
  function select_distinct_in_array($table, $field, $wherefield, $inArr)
  {
    global $con;

    $list = array();


    $sql = "SELECT DISTINCT {$field} FROM {$table} WHERE {$wherefield} IN ( '" . implode("', '", $inArr) . "' )";



    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$distinctCourse = $func->select_distinct_in_array('class','courseID','class_id',$selallclassArr);
			*/






  //select distinct in array logic where
  function select_distinct_in_arraylogic($table, $field, $wherefield, $inArr, $logic, $where = array())
  {
    global $con;

    $list = array();


    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field2    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT DISTINCT {$field} FROM {$table} WHERE {$wherefield} IN ( '" . implode("', '", $inArr) . "' ) {$logic} {$field2} {$operator} '{$value}' ";


        $qry = $con->query($sql);
        while ($row = mysqli_fetch_assoc($qry)) {
          $list[] = $row;
        }
        return $list;
      }
    }
    return null;
  }
  /*	sample procedure selectall	
			$distinctCourse = $func->select_distinct_in_array('class','courseID','class_id',$selallclassArr);
			*/





  //select distinct order by
  function select_distinctorderby($table, $col_arr = array(), $byfield, $sortorder)
  {
    global $con;

    $list = array();


    if (count($col_arr) === 1) {
      $field  = $col_arr[0];

      $sql = "SELECT DISTINCT {$field} FROM {$table} ORDER BY {$byfield}  {$sortorder} ";
    }
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }


  //select distinct where order by
  function select_distinct_where_orderby($table, $distinctfield, $where = array(), $byfield, $sortorder)
  {
    global $con;

    $list = array();

    $field = $where[0];
    $operator = $where[1];
    $value = $where[2];


    $sql = "SELECT DISTINCT {$distinctfield} FROM {$table} WHERE  {$field} {$operator} {$value}  ORDER BY {$byfield}  {$sortorder} ";


    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }






  //select distinct join where

  function select_distinct_join_where_orderby($distincttbl, $distinctval, $table, $table2, $ref, $ref2, $table3, $where = array(), $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT  DISTINCT {$distincttbl}.{$distinctval}  FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' ORDER BY {$tableref}.{$col} {$sortorder} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }


  //two where
  function selectdistinct_join_where2_orderby($distincttbl, $distinctval, $table, $table2, $ref, $ref2, $table3, $table4, $where = array(), $logic, $where2 = array(), $tableref, $col, $sortorder)
  {
    global $con;
    $list = array();

    if (count($where) === 3 && count($where2)) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];
      $field2    = $where2[0];
      $operator2   = $where2[1];
      $value2    = $where2[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT DISTINCT {$distincttbl}.{$distinctval}  FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}' {$logic} {$table4}.{$field2} {$operator2} '{$value2}'  ORDER BY {$tableref}.{$col} {$sortorder} ";


        $qry = $con->query($sql);


        $rowcount = mysqli_num_rows($qry);


        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }




  //select distinct where
  function select_distinctwhere($table, $byfield, $sortorder, $col_arr = array(), $saan = array())
  {
    global $con;

    $list = array();


    if (count($col_arr) === 1) {
      $field  = $col_arr[0];




      $sql = "SELECT DISTINCT {$field} FROM {$table} WHERE {$saan[0]} {$saan[1]} {$saan[2]} ORDER BY {$byfield}  {$sortorder}";
    }
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  //select distinct
  function select_distinctlimit($table, $start, $perPage, $col_arr = array())
  {
    global $con;

    $list = array();


    if (count($col_arr) === 1) {
      $field  = $col_arr[0];

      $sql = "SELECT DISTINCT {$field} FROM {$table} ";
    }
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/



  //generic select * function with sorting
  function selectallorderby($table, $col, $sortorder)
  {
    global $con;

    $list = array();
    $sql = "SELECT * FROM {$table} ORDER BY {$col} {$sortorder}";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  //generic select * function with sorting
  function selectallorderbylimit($table, $col, $sortorder, $start, $perPage)
  {
    global $con;

    $list = array();
    $sql = "SELECT * FROM {$table} ORDER BY {$col} {$sortorder} LIMIT {$start}, {$perPage}";
    $qry = $con->query($sql);
    while ($row = mysqli_fetch_assoc($qry)) {
      $list[] = $row;
    }
    return $list;
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


  function selectorderby($table, $col, $col2, $start, $perPage, $sortorder, $where = array())
  {

    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}' ORDER BY {$col} {$sortorder}, {$col2} {$sortorder} LIMIT {$start}, {$perPage}";

        $qry = $con->query($sql);

        $rowcount = mysqli_num_rows($qry);

        if ($rowcount != 0) {
          for ($x = 1; $x <= $rowcount; $x++) {
            $row = mysqli_fetch_assoc($qry);
            $list[] = $row;
          }
          return $list;
        }
        return null;
      }
    }
  }

  /*	sample procedure selectall	
			$cemail = $func->selectall('users','col','start','perpage');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/

  function delete($table, $where = array())
  {
    global $con;
    $list = array();

    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value     = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "DELETE FROM {$table} WHERE {$field} {$operator} '{$value}'";

        $qry = $con->query($sql);

        return $qry;
      }
    }
    return false;
  }

  /* delete procedure
			$cemail = $func->delete('users',array('username','=','Dale'));

			if ($cemail){
				echo "record Deleted";
			} else {
				echo "failed";
			}
		*/

  //generic insert function
  //  parameter table and fields
  function insert($table, $fields = array())
  {
    global $con;
    $keys = array_keys($fields);
    $values = '';
    $x = 1;

    foreach ($fields as $field) {
      $values .= "'" . $field . "'";
      if ($x < count($fields)) {
        $values .= ', ';
      }
      $x++;
    }

    $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

    $qry = $con->query($sql);


    if ($qry) {
      return true;
    } else {
      return false;
    }
  }
  /* sample procedure for page
		$userInsert = $func->insert('users',array(
		'name' => 'Dale',
		'username' => 'Dale',
		'password' => 'password'
		));
		*/

  function update($table, $param, $param_value, $fields)
  {
    global $con;
    $set = '';
    $x = 1;

    foreach ($fields as $name => $value) {
      $set .= "{$name} = '{$value}'";
      if ($x < count($fields)) {
        $set .= ', ';
      }
      $x++;
    }

    $sql = "UPDATE {$table} SET {$set} WHERE {$param} = {$param_value}";


    //echo $sql;
    $qry = $con->query($sql);

    if ($qry && $con->affected_rows > 0) {
      return true;
    } else {
      return null;
    }
  }

  /* sample update procedure
			$userUpdate = $func->update('users','userid',3, array(
					'password' => 'newpassword', 
					 'name' => 'Dale Garret'
				));

				
			if ($userUpdate){
				echo "record updated";
			} else {
				echo "failed";
			}
		*/

  function uploadfiles($filetoupload, $dir)
  {

    $error = '';

    //make the allowed extensions
    //$goodExtensions = array(
    //	'.jpg', '.png','.jpeg',); 

    //set the current directory where you wanna upload the doc/docx  or pdf files
    $uploaddir = $dir;
    //get the names of the file that will be uploaded

    $fname = $_FILES[$filetoupload]['name'];
    $min_filesize = 10; //set up a minimum file size(a doc/docx can't be lower then 10 bytes)
    $stem = substr($fname, 0, strpos($fname, '.'));

    //take the file extension
    $extension = substr($fname, strpos($fname, '.'), strlen($fname) - 1);

    //verify if the file extension is jpeg or png or jpg
    if (!in_array($extension, $goodExtensions))
      $error .= 'Extension not allowed<br>';
    echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1

    if (filesize($_FILES[$filetoupload]['tmp_name']) < $min_filesize)
      $error .= 'File size too small<br>' . "\n";
    $uploadfile = $uploaddir . $stem . $extension;

    $filename = $stem . $extension;

    //upload the file to

    if (move_uploaded_file($_FILES[$filetoupload]['tmp_name'], $uploadfile)) {
      //echo $fname .' has been uploaded... ' ;
    }

    return $uploadfile;
  } //end of  upload


  function uploadfiles_extraname($filetoupload, $dir, $xname)
  {

    $error = '';

    //make the allowed extensions
    //$goodExtensions = array(
    //	'.jpg', '.png','.jpeg',); 

    //set the current directory where you wanna upload the doc/docx  or pdf files
    $uploaddir = $dir;
    //get the names of the file that will be uploaded

    $fname = $_FILES[$filetoupload]['name'];
    $min_filesize = 10; //set up a minimum file size(a doc/docx can't be lower then 10 bytes)
    $stem = substr($fname, 0, strpos($fname, '.'));

    //take the file extension
    $extension = substr($fname, strpos($fname, '.'), strlen($fname) - 1);

    //rename
    $stem = $stem . $xname;
    //verify if the file extension is jpeg or png or jpg
    if (!in_array($extension, $goodExtensions))
      $error .= 'Extension not allowed<br>';
    echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1

    if (filesize($_FILES[$filetoupload]['tmp_name']) < $min_filesize)
      $error .= 'File size too small<br>' . "\n";
    $uploadfile = $uploaddir . $stem . $extension;

    $filename = $stem . $extension;

    //upload the file to

    if (move_uploaded_file($_FILES[$filetoupload]['tmp_name'], $uploadfile)) {
      //	echo $fname .' has been uploaded... ' ;
    }

    return $uploadfile;
  } //end of  upload




  // End of functions
}

$func = new res();



/* Extra queries
		Number only
		SELECT * FROM `enrollees` WHERE studentGrade REGEXP '^[0-9€]'  AND studentGrade <=3 


	*/
