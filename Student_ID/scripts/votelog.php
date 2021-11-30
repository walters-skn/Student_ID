<?php

$host = 'localhost';
$dbname = 'VoteLogDB';
$username = 'comp2190SA';
$password = '2020Sem1';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $consituency;
    $polldiv;
    $pollname;
    $can1 = null;
    $can2 = null;
    $reject = null;
    $total = null;
    $test = "/^[0-9]*$/";
    $pattern ="/^[A-Z,0-9]+$/";
    $invalid = "This is Invalid";
    
    if (empty($_POST["clerk"]) || !preg_match ($test, $_POST["clerk"])){
        echo"Clerk ID: $invalid <br>";
    }else{
        $clerk = intval($_POST["clerk"]);
    }
    if (empty($_POST["consituency"]) || !preg_match ($test, $_POST["consituency"])){
        echo"Consituency ID: $invalid <br>";
    }else{
        $consituency = intval($_POST["const"]);
    }
    if (empty($_POST["polldiv"]) || !preg_match ($test, $_POST["polldiv"])){
        echo"Poll Division ID: $invalid <br>";
    }else{
        $polldiv = intval($_POST["polld"]);
    }
    if (empty($_POST["pollname"]) || !preg_match ($pattern, $_POST["pollname"])){
        echo"Poll Station: $invalid <br>";
    }else{
        $hold = $_POST["pollname"];
        $pollstat = strval($hold);
    }
    if (empty($_POST["can1"]) || !preg_match ($test, $_POST["can1"])){
        echo"Candidate 1 Votes: $invalid <br>";
    }else{
        $can1v = intval($_POST["can1"]);
    }
    if (empty($_POST["can2"]) || !preg_match ($test, $_POST["can2"])){
        echo"Candidate 2 Votes: $invalid <br>";
    }else{
        $can2v = intval($_POST["can2votes"]);
    }
    if (empty($_POST["reject"]) || !preg_match ($test, $_POST["reject"])){
        echo"Rejected Votes: $invalid <br>";
    }else{
        $rejected = intval($_POST["reject"]);
    }
    $cal = intval($can1) + intval($can2) + intval($reject);
    if (empty($_POST["total"]) || !preg_match ($test, $_POST["total"]) || intval($_POST["total"]) != $cal){
        echo"Total Votes: $invalid <br>";
    }else{
        $totalv = intval($_POST["total"]);
    }

    if(isset($clerk) && isset($consituency) && isset($polldiv) && isset($pollname) && isset($can1) && isset($can2) && isset($reject) && isset($total)){      
        echo"DATA RECIEVED <br>";
        echo "$consituency, $clerk, $polldiv, $pollname, $can1, $can2, $reject, $total <br>";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO StationVotes(constituency_id, clerk_id, poll_division_id, polling_station_code,candidate1Votes, candidate2Votes, rejectedVotes, totalVotes)
        VALUES ($consituency, $clerk, $polldiv, $pollname, $can1, $can2, $reject, $total)";
        $conn->exec($sql);
        $mydata = $conn->query("SELECT constituency_id, clerk_id, poll_division_id, polling_station_code, candidate1Votes, candidate2Votes, rejectedVotes, totalVotes  FROM StationVotes");

        $data = $mydata->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $error = "YOU HAVE AN ERROR";
        echo $error;
    }
    $conn = null;
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>

<?php if(isset($clerk) && isset($consituency) && isset($polldiv) && isset($pollstat) && isset($can1v) && isset($can2v) && isset($rejected) && isset($totalv)):?>
    
    <link rel="stylesheet" href="/styles/p1b.css">
    <div class = "versionB">
    <table>
    <thead>
        <tr>
            <th>Constituency</th>
            <th>Polling Div.</th>
            <th>Polling Stn</th>
            <th> Location</th>
            <th>Candidate1</th>
            <th>Candidate2</th>
            <th>Rejected</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $data): ?>
            <tr>
                <td><?php echo $data['constituency_id']; ?></td>
                <td><?php echo $data['clerk_id']; ?></td>
                <td><?php echo $data['poll_division_id']; ?></td>
                <td><?php echo $data['polling_station_code']; ?></td>
                <td><?php echo $data['candidate1Votes']; ?></td>
                <td><?php echo $data['candidate2Votes']; ?></td>
                <td><?php echo $data['rejectedVotes']; ?></td>
                <td><?php echo $data['totalVotes']; ?></td>
            </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    </div>  
<?php endif;?>
