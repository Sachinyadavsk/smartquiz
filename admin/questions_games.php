<?php
require('top.inc.php');

$game_id = '';
$question = '';
$pattern = '';
$msg = '';
$image_required = 'required';
$image = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM questions WHERE id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $game_id = $row['game_id'];
        $question = $row['question'];
        $pattern = $row['pattern'];
        $image = $row['image'];
    } else {
        header('location:questions.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $game_id = get_safe_value($con, $_POST['game_id']);
    $question = get_safe_value($con, $_POST['question']);
    $pattern = get_safe_value($con, $_POST['pattern']);

    $res = mysqli_query($con, "SELECT * FROM questions WHERE question='$question'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
                // Allowed to proceed for update
            } else {
                $msg = "Questions already exists";
            }
        } else {
            $msg = "Questions already exists";
        }
    }

         if ($msg == '') {
                if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
                    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                    $file_name = $_FILES['photo']['name'];
                    $file_tmp = $_FILES['photo']['tmp_name'];
                    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
                    if (in_array($file_ext, $allowed_types)) {
                        $new_file_name = time() . '_' . $file_name;
                        $file_path = '../images/question/' . $new_file_name;
                        move_uploaded_file($file_tmp, $file_path);
                        $image = $new_file_name;
                    } else {
                        $msg = "Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.";
                    }
                }
                
                if ($msg == '') {
                    if (isset($_GET['id']) && $_GET['id'] != '') {
                        if ($image != '') {
                            $update_sql = "UPDATE questions SET game_id='$game_id', question='$question', pattern='$pattern', image='$image', status='0' WHERE id='$id'";
                        } else {
                            $update_sql = "UPDATE questions SET game_id='$game_id', question='$question', pattern='$pattern', status='0' WHERE id='$id'";
                        }
                        mysqli_query($con, $update_sql);
                    } else {
                        mysqli_query($con, "INSERT INTO questions (game_id, question, image, pattern, status) VALUES ('$game_id', '$question', '$image', '$pattern', '0')");
                    }
                    header('location:questions.php');
                    die();
                }
         }
    
}
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Manage Question</strong><small></small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="categories" class="form-control-label">Games Type</label>
                                        <select class="form-control" name="game_id" id="game_ids" required>
                                            <option value="">Select a Question Type</option>
                                            <?php
                                            $sql = "SELECT * FROM games";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['id'] == $game_id) ? 'selected' : '';
                                                echo "<option value='{$row['id']}' {$selected}>{$row['name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="question" class="form-control-label">Question Name</label>
                                        <input type="text" name="question" placeholder="Enter question name" class="form-control" required value="<?php echo $question ?>">
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <label for="pattern" class="form-control-label" required >Question Name</label>
                                            <select class="form-control" name="pattern">
                                                <?php
                                                  if(!empty($pattern)){
                                                    ?>
                                                 <option value="<?php echo $pattern; ?>">
                                                    <?php echo $pattern; ?>
                                                </option>
                                                    <?php
                                                  }else{
                                                    ?>
                                                     <option>Choose the Pattern</option>
                                                    <?php
                                                  }
                                                  ?>
                                                <option value="1">Pattern 1</option>
                                                <option value="2">Pattern 2</option>
                                                <option value="3">Pattern 3</option>
                                                
                                            </select>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <label for="Image" class="form-control-label">Game Profile</label>
                                        <input type="file" name="photo" class="form-control">
                                        <?php if ($image != '') { ?>
                                            <a href="uploads/<?php echo $image; ?>" target="_blank">View Image</a>
                                        <?php } ?>
                                    </div>
                                    
                                </div>
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info float-right">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error">
                                <?php echo $msg ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function get_sub_cat(sub_cat_id) {
        var categories_id = jQuery('#game_ids').val();
        jQuery.ajax({
            url: 'get_sub_cat.php',
            type: 'post',
            data: 'game_id=' + game_id,
            success: function (result) {
                jQuery('#game_ids').html(result);
            }
        });
    }
</script>

<?php
require('footer.inc.php');
?>
<script>
<?php
if (isset($_GET['id'])) {
?>
get_sub_cat('<?php echo $game_id ?>');
<?php } ?>
</script>
