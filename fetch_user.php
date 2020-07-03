<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '" . $_SESSION['user_id'] . "' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="glitch_1 table-bordered ">
	<tr>
		<th width="70%">Username</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
	</tr>
';

foreach ($result as $row) {
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
    if ($user_last_activity > $current_timestamp) {
        $status = '<span class="glitch_1" data-text="online">' . $text1 = "online" . '</span>';
    } else {
        $status = '<span style="color:red" class="glitch_4" data-text="offline">' . $text2 = "offline" . '</span>';
    }
    $output .= '
	<tr>
		<td class="glitch_2" data-text="$row["username"]">' . $row['username'] . ' ' . count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect) . ' ' . fetch_is_type_status($row['user_id'], $connect) . '</td>
		<td>' . $status . '</td>
		<td><input type="button" style="background-color: rgba(0,0,0,0)" class="start_chat glitch_2" data-touserid="' . $row['user_id'] . '" data-tousername="' . $row['username'] . '" value="' . $text2 = "Chat" . '"></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>