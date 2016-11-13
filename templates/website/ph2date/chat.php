<?php

/*

Copyright (c) 2009 Anant Garg (anantgarg.com | inscripts.com)

This script may be used for non-commercial purposes only. For any
commercial purposes, please contact the author at
anant.garg@inscripts.com

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

*/

require '../../../application/config/init.php';

$DBPATH = PH2DATE_DB_HOST;
$DBUSER = PH2DATE_DB_USR;
$DBPASS = PH2DATE_DB_PWD;
$DBNAME = PH2DATE_DB_NAME;

@session_start();

global $db;

$db = new PDO("mysql:host=$DBPATH;dbname=$DBNAME;charset=utf8", $DBUSER, $DBPASS);

// $stmt = $db->query("SELECT * FROM video");
//  $s = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($s);die;
if ($_GET['action'] == "chatheartbeat") { chatHeartbeat(); }
if ($_GET['action'] == "sendchat") { sendChat(); }
if ($_GET['action'] == "sendchat2") { sendChat2(); }

if ($_GET['action'] == "closechat") { closeChat(); }
if ($_GET['action'] == "startchatsession") { startChatSession(); }

if (!isset($_SESSION['chatHistory'])) {
    $_SESSION['chatHistory'] = array();
}

if (!isset($_SESSION['openChatBoxes'])) {
    $_SESSION['openChatBoxes'] = array();
}

function chatHeartbeat() {
    global $db;
    $sql = "select * from chat where (chat.to =? AND recd = 0) order by id ASC";
    $stmt = $db->prepare($sql);


    $stmt->execute(array($_SESSION['username']));
    $items = '';

    $chatBoxes = array();
$chats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($chats AS $chat) {
//print_r($chat);die;
        if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {
            $items = $_SESSION['chatHistory'][$chat['from']];
        }

        $chat['message'] = smile($chat['message']);

        $items .= <<<EOD
                       {
            "s": "0",
            "f": "{$chat['from']}",
            "m": "{$chat['message']}"
       },
EOD;

    if (!isset($_SESSION['chatHistory'][$chat['from']])) {
        $_SESSION['chatHistory'][$chat['from']] = '';
    }

    $_SESSION['chatHistory'][$chat['from']] .= <<<EOD
                           {
            "s": "0",
            "f": "{$chat['from']}",
            "m": "{$chat['message']}"
       },
EOD;

        unset($_SESSION['tsChatBoxes'][$chat['from']]);
        $_SESSION['openChatBoxes'][$chat['from']] = $chat['sent'];
    }

    if (!empty($_SESSION['openChatBoxes'])) {
    foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
        if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
            $now = time()-strtotime($time);
            $time = date('g:iA M dS', strtotime($time));

            $message = "Sent at $time";
            if ($now > 180) {
                $items .= <<<EOD
{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;

    if (!isset($_SESSION['chatHistory'][$chatbox])) {
        $_SESSION['chatHistory'][$chatbox] = '';
    }

    $_SESSION['chatHistory'][$chatbox] .= <<<EOD
        {
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;
            $_SESSION['tsChatBoxes'][$chatbox] = 1;
        }
        }
    }
}

    $sql = "update chat set recd = 1 where chat.to =? and recd = 0";
    //$query = mysql_query($sql);
    $stmt = $db->prepare($sql);
    $stmt->execute( array($_SESSION['username']) );

    if ($items != '') {
        $items = substr($items, 0, -1);
    }
header('Content-type: application/json');
?>
{
        "items": [
            <?php echo $items;?>
        ]
}

<?php
            exit(0);
}

function chatBoxSession($chatbox) {

    $items = '';

    if (isset($_SESSION['chatHistory'][$chatbox])) {
        $items = $_SESSION['chatHistory'][$chatbox];
    }

    return $items;
}

function startChatSession() {
    $items = '';
    if (!empty($_SESSION['openChatBoxes'])) {
        foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
            $items .= chatBoxSession($chatbox);
        }
    }


    if ($items != '') {
        $items = substr($items, 0, -1);
    }

header('Content-type: application/json');
?>
{
        "username": "<?php echo $_SESSION['username'];?>",
        "items": [
            <?php echo $items;?>
        ]
}

<?php


    exit(0);
}



function sendChat2() {
    global $db;
    $from = $_SESSION['username'];
    $to = 8;
    $message = "mm";


    $_SESSION['openChatBoxes'][$to] = date('Y-m-d H:i:s', time());

    $messagesan = smile($message);

    if (!isset($_SESSION['chatHistory'][$to])) {
        $_SESSION['chatHistory'][$to] = '';
    }

    $_SESSION['chatHistory'][$to] .= <<<EOD
                       {
            "s": "1",
            "f": "{$to}",
            "m": "{$messagesan}"
       },
EOD;


    unset($_SESSION['tsChatBoxes'][$to]);

    $sql = "insert into chat (chat.from,chat.to,message) values (?,?,?)";
    //$query = mysql_query($sql);
    $stmt = $db->prepare($sql);


    $stmt->execute( array($from, $to,$message ) );

    echo "1";
    exit(0);
}


function sendChat() {
    global $db;
    $from = $_SESSION['username'];
    $to = $_POST['to'];
    $message = $_POST['message'];


    $_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());

    $messagesan = smile($message);

    if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
        $_SESSION['chatHistory'][$_POST['to']] = '';
    }

    $_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
                       {
            "s": "1",
            "f": "{$to}",
            "m": "{$messagesan}"
       },
EOD;


    unset($_SESSION['tsChatBoxes'][$_POST['to']]);

    $sql = "insert into chat (chat.from,chat.to,message) values (?,?,?)";
    //$query = mysql_query($sql);
    $stmt = $db->prepare($sql);


    $stmt->execute( array($from, $to,$message ) );

    echo "$messagesan";
    exit(0);
}

function closeChat() {

    unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);

    echo "1";
    exit(0);
}

function sanitize($text) {
    $text = htmlspecialchars($text, ENT_QUOTES);
    $text = str_replace("\n\r","\n",$text);
    $text = str_replace("\r\n","\n",$text);
    $text = str_replace("\n","<br>",$text);
    return $text;
}

function smile($text) {
    global $db;

    $text = sanitize($text);
    $sql = "select * from emotions";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($emotions = $stmt->fetchAll(PDO::FETCH_ASSOC) )
    {
        foreach ($emotions as $emotion)
        {
            $word = $emotion['word'];
            $img =  $emotion['img'];
            $image = '<img src=' . PH2DATE_BASE_URL . 'assets/smilies/' . $img . ' />';
            $text = str_replace($word, $image, $text);
        }

    }
    return $text;
}
