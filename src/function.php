<?php
function addList($text)
{
    $lists = isset($_SESSION['lists'])?$_SESSION['lists']:array();
    $list = array('id'=> rand(10, 100000000), 'text' => $text);
    array_push($lists, $list);
    $_SESSION['lists'] = $lists;
}

function displayList()
{
    $lists = isset($_SESSION['lists'])?$_SESSION['lists']:array();

    $html = '';

    if (sizeof($lists)) {
        foreach ($lists as $key => $list) {
            $html .= '<div class="list">
                        <h3>'.$list["text"].'
                            &nbsp; <a href="index.php?id='.$list["id"].'&action=edit">edit</a>
                            &nbsp; <a href="index.php?id='.$list["id"].'&action=delete">delete</a> 
                        </h3>            
                     </div>';
        }
    }

    return $html;
}
function getListitem($id)
{
    $lists = isset($_SESSION['lists'])?$_SESSION['lists']:array();

    if (sizeof($lists)) {
        foreach ($lists as $key => $list) {
            if ($list['id'] == $id) {
                return $list;
            }
        }
    }
}

function updateListItem($listToUpdate)
{
    $lists = isset($_SESSION['lists'])?$_SESSION['lists']:array();

    if (sizeof($lists)) {
        foreach ($lists as $key => $list) {
            if ($list['id'] == $listToUpdate['id']) {
                $lists[$key]['text'] = $listToUpdate['text'];
                $_SESSION['lists'] = $lists;
                return $list;
            }
        }
    }
}

function deleteListItem($id)
{
    $lists = isset($_SESSION['lists'])?$_SESSION['lists']:array();

    if (sizeof($lists)) {
        foreach ($lists as $key => $list) {
            if ($list['id'] == $id) {
                unset($lists[$key]);
                $_SESSION['lists'] = $lists;
                return true;
            }
        }
    }
}