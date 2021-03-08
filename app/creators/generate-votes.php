<?php

require_once "app/functions.php";
require_once "app/helpers/queries.php";

$db = buildDatabase();
$polls = getAllPolls($db);

foreach ($polls as $poll) {
    $pollId = $poll[0];
    if (!userVotedPoll($db, $_SESSION['user_id'], $pollId)) {
        ?>
        <form action="" class="box is-7">
            <div class="columns">
                <div class="column is-4">
                    <?php echo $poll[1]; ?>
                </div>
                <div class="column is-8">
                    <?php echo $poll[2]; ?>
                </div>
            </div>
            <div class="columns d-flex justify-content-center">
                <div class="column">
                    <div class="control d-flex justify-content-center">
                        <div class="select">
                            <select>
                                <?php
                                $options = getAccordingOptionsForPoll($db, $poll[0]);
                                foreach ($options as $singleOption) {
                                    ?>
                                    <option>
                                        <?php echo $singleOption[1]; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="column d-flex justify-content-center">
                        <div class="control">
                            <button class="button is-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<?php
    }
}
$db->close();
?>
