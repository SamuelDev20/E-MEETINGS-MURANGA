<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.card{
    padding-left:-160px;
    margin-left:-30px;
}
select{
    width:100%;
    height:40px;
    border:1px  grey;
    border-radius: .5px;
    box-shadow: 1px 1px 2px 1px darkgrey;
}
</style>
<div class="card-body">
    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Meeting Type</th>
                <th>Meeting date</th>
                <th>Meeting Time</th>
                <th>Meeting Agenda</th>
                <th>Members Absent</th>
                <th>Members Present</th>
                <th>Meeting Content</th>
                <th>Minutes document</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $advance_qry=$conn->query("SELECT * FROM `meetings`") or die(mysqli_error());
                while($row=$advance_qry->fetch_array()){
            ?>
            <tr>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['agenda'];?></td>
                <td><?php echo $row['absent'];?></td>
                <td><?php echo $row['attendees'];?></td>
                <td><?php echo $row['content'];?></td>
                <td>
				<?php
$file = $row['file'];
if (!empty($file)) {
    // File exists, provide download link
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array(strtolower($fileExtension), ['pdf', 'doc', 'docx', 'txt'])) {
        // If the file is a PDF, Word document, or text file, provide a direct link to download the file
        echo "<a href='download.php?file=" . urlencode($file) . "' target='_blank'>Download Document</a>";
    } else {
        // For other file types, display a message that the file cannot be downloaded directly
        echo "This file type cannot be downloaded directly. Please contact the administrator for assistance.";
    }
} else {
    // No document uploaded
    echo "Empty";
}
?>

</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // jQuery click event handler for mark as read button
        $('.mark-read').click(function(){
            var id = $(this).data('id');
            // Send AJAX request to mark the message as read or unread
            $.ajax({
                url: 'mark_as_read.php',
                type: 'POST',
                data: { id: id },
                success: function(response){
                    // Reload the page after successful marking
                    location.reload();
                }
            });
        });
    });
</script>

</body> 
</html>
