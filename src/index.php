<?php

session_start();
include('function.php');
$action = isset($_GET['action'])?$_GET['action']:'';

$editListItem = array();

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    $list = $_REQUEST['list'];
    $id = $_REQUEST['id'];
//   print_r($_POST);
    $listid = $_REQUEST['listid'];

    $updateListItem = array('id'=>$listid, 'text'=>$list);

    switch ($action) {
        case 'add':
            addList($list);
            break;
        case 'edit':
            $editListItem = getListItem($id);
        case 'update':
            updateListItem($updateListItem);
            break;
        case 'delete':
            deleteListItem($id);
            break;
    }
}

print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
    <div id="wrapper">
        <div id="listForm">
            <form action="" method="post">
                <label for="list">List 
                    <input type="hidden" name="listid" value="<?php echo $editListItem['id']; ?>">
                    <input type="text" name="list" <?php if (sizeof($editListItem)) : ?> value = "<?php echo $editListItem['text']; ?>"<?php endif; ?>>

                    <?php if (sizeof($editListItem)) : ?>
                        <input type="submit" name="action" value="update"> 
                    <?php else : ?>
                        <input type="submit" name="action" value="add"> 
                    <?php endif; ?>
                </label>
            </form>
        </div>
        <div id="allList">
            <!-- <div class="list">
                <h3>Lorem ipsum dolor sit amet.</h3>
                
            </div>

            <div class="list">
            <h3>Lorem ipsum dolor sit amet.</h3>                
            </div>

            <div class="list">
            <h3>Lorem ipsum dolor sit amet.</h3>            
            </div> -->
            <?php echo displayList(); ?>
        </div>
    </div>
</body>
</html>

<?php
// session_destroy();
?>