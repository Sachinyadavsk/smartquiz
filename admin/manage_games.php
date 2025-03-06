<?php
require('top.inc.php');

$image = '';
$type = '';
$brand = '';
$name = '';
$launch = '';
$short_desc = '';
$game_price = '';
$game_time = '';
$game_play_users = '';
$msg = '';
$image_required = 'required';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM games WHERE id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $type = $row['type'];
        $name = $row['name'];
        $short_desc = $row['short_desc'];
        $game_price = $row['game_price'];
        $game_time = $row['game_time'];
        $game_play_users = $row['game_play_users'];
        $image = $row['image'];
    } else {
        header('location:games.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $type = get_safe_value($con, $_POST['type']);
    $name = get_safe_value($con, $_POST['name']);
    $short_desc = get_safe_value($con, $_POST['short_desc']);
    $game_price = get_safe_value($con, $_POST['game_price']);
    $game_time = get_safe_value($con, $_POST['game_time']);
    $game_play_users = get_safe_value($con, $_POST['game_play_users']);


    $res = mysqli_query($con, "SELECT * FROM games WHERE name='$name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
                // Allowed to proceed for update
            } else {
                $msg = "Game already exists";
            }
        } else {
            $msg = "Game already exists";
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
                $file_path = '../images/games/' . $new_file_name;
                move_uploaded_file($file_tmp, $file_path);
                $image = $new_file_name;
            } else {
                $msg = "Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.";
            }
        }

        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                if ($image != '') {
                    $update_sql = "UPDATE games SET type='$type', name='$name', short_desc='$short_desc', game_price='$game_price', game_time='$game_time', game_play_users='$game_play_users', image='$image', status='0' WHERE id='$id'";
                } else {
                    $update_sql = "UPDATE games SET type='$type', name='$name', short_desc='$short_desc', game_price='$game_price', game_time='$game_time', game_play_users='$game_play_users', status='0' WHERE id='$id'";
                }
                mysqli_query($con, $update_sql);
            } else {
                mysqli_query($con, "INSERT INTO games (type, name, short_desc, game_price, game_time, game_play_users, image, status) VALUES ('$type', '$name', '$short_desc', '$game_price', '$game_time', '$game_play_users', '$image', '0')");
            }
            header('location:games.php');
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
                    <div class="card-header"><strong>Manage Games</strong><small></small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="categories" class="form-control-label">Games Type</label>
                                        <select class="form-control" name="type" id="categories_id" required>
                                              <?php
                                              if(!empty($type)){
                                                ?>
                                             <option value="<?php echo $type; ?>">
                                                <?php echo $type; ?>
                                            </option>
                                                <?php
                                              }else{
                                                ?>
                                                 <option>Choose the Game Category</option>
                                                <?php
                                              }
                                              ?>
                                                <option value="trending_now">Trending Now</option>
                                                <option value="sports">Sports</option>
                                                <option value="general_knowledge">General Knowledge</option>
                                                <option value="entertainment">Entertainment</option>
                                                <option value="funny">Funny</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="categories" class="form-control-label">Game Name</label>
                                        <input type="text" name="name" placeholder="Enter game name" class="form-control" required value="<?php echo $name ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Image" class="form-control-label">Game Profile</label>
                                        <input type="file" name="photo" class="form-control" <?php echo $image_required; ?>>
                                        <?php if ($image != '') { ?>
                                            <a href="uploads/<?php echo $image; ?>" target="_blank">View Image</a>
                                        <?php } ?>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="categories" class="form-control-label">Game Price</label>
                                        <input type="number" name="game_price" placeholder="Enter game price" class="form-control" required value="<?php echo $game_price ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="categories" class="form-control-label">Game Time</label>
                                        <input type="time" name="game_time" placeholder="Enter game time" class="form-control" required value="<?php echo $game_time ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="categories" class="form-control-label">Game play Users</label>
                                        <input type="number" name="game_play_users" placeholder="Enter game play Users" class="form-control" required value="<?php echo $game_play_users ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="categories" class="form-control-label">Game Short Description</label>
                                        <input type="text" name="short_desc" id="desc" placeholder="Enter short description" class="form-control" required value="<?php echo $short_desc ?>">
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
        var categories_id = jQuery('#categories_id').val();
        jQuery.ajax({
            url: 'get_sub_cat.php',
            type: 'post',
            data: 'categories_id=' + categories_id + '&sub_cat_id=' + sub_cat_id,
            success: function (result) {
                jQuery('#sub_categories_id').html(result);
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
get_sub_cat('<?php echo $sub_categories_id ?>');
<?php } ?>
</script>

 <script>
    CKEDITOR.replace('desc', {
        // Custom configuration options
        toolbar: 'Basic'
    });
</script>
