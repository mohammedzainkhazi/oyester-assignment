<?php
  $key = $_GET['key'];
  $con = mysqli_connect('localhost','root','');
    if(!$con){
        print "<script>alert('Connection Error !);</script>"; 
    }
    if(!mysqli_select_db($con,'assignment'))
    {
        print "<script>alert('DATABASE not Present');</script>";
    }
    $qry = "SELECT * FROM keyword_table WHERE keyword='$key'";

    $sql = mysqli_query($con,$qry);
       while($row=mysqli_fetch_array($sql))
       {
        $tn = $row['tablename'];
        $cn = $row['column_names'];
       }
        $index =  (explode(",",$cn));
        $c1 =  $index[0];
        $c2 =  $index[1];
        ?>
       <table>
          <tr bgcolor="orange">
            <th style="padding-right:10px"><?php echo $c1?></th>
            <th><?php echo $c2?></th>
          </tr>
      <?php
       $qry = "SELECT $c1,$c2 FROM $tn ";
       $sql = mysqli_query($con,$qry);
       while($row=mysqli_fetch_array($sql))
       {
        $c1v = $row[$c1];
        $c2v = $row[$c2];?>
        <tr>
        <td><?php echo $c1v;?></td>
        <td><?php echo $c2v;?></td>
        </tr>
       <?php
       } ?>
        </table>
      
