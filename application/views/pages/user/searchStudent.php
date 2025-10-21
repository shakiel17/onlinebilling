<script>
            function refreshParent() {
                if (window.opener && !window.opener.closed) {
                    window.opener.location.reload();
                }
            }
            window.onbeforeunload = refreshParent;
        </script>
<table width="100%" border="0">
    <tr>
        <td><b>Search Student ID or Lastname</b></td>
    </tr>
    <form action="<?=base_url('searchStudentResult');?>" method="POST">    
        <tr>
            <td><input type="text" name="description" style="height:30px; width:300px;"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" style="height:30px; width:70px; background-color:orange; border:0;" value="Search"></td>
        </tr>    
    </form>
</table>
<p>
<?php
foreach($student as $item){
    echo "<a href='".base_url('user_add_student/'.$item['student_id'])."' style='color:black;'><b>".$item['student_id']."&nbsp;&nbsp;&nbsp; ".$item['student_lastname'].", ".$item['student_firstname']." ".$item['student_middlename']."</b></a><br>";
}
?>
</p>