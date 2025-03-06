<?php
include("db_connection.php");

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 8;
$offset = ($page - 1) * $limit;

$games = $con->query("SELECT * FROM games  WHERE status='1' order by games.id desc LIMIT $offset, $limit");

if ($games->num_rows > 0) {
    while ($game = $games->fetch_assoc()) {
        ?>
        
     <!--dynmically data get-->
        <div>
            <a href="https://game.reapbucks.com/view-game/<?php echo str_replace(' ','-', $game['name']); ?>">
                <div class="aspect-video">
                    <img src="https://game.reapbucks.com/images/games/<?php echo $game['image']?>"
                        alt="<?php echo $game['name']?>"
                        class="w-full aspect-video rounded-lg transition-transform scale-1 hover:scale-105" />
                </div>
                <h3 class="text-lg pt-2 font-bold text-white text-center"><?php echo $game['name']?></h3>
            </a>
        </div>
        <!--dynmically data get-->
        <?php
    }
} else {
    echo ''; // No more games
}
?>
