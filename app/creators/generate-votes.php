<?php

require_once "app/functions.php";
require_once "app/helpers/queries.php";

$db = buildDatabase();
$polls = getAllPolls($db);
$userId = $_SESSION['user_id'];

foreach ($polls as $poll) {
    $pollId = $poll[0];
    if (!userVotedPoll($db, $_SESSION['user_id'], $pollId)) {
        ?>
        <form action="/Sparker.com/app/submit-form.php" class="box is-7" method="post" data-form-id="<?= $pollId ?>">
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
                            <select name="option">
                                <?php
                                $options = getAccordingOptionsForPoll($db, $poll[0]);
                                foreach ($options as $singleOption) {
                                    ?>
                                    <option value="<?php echo "$singleOption[1]-$pollId-$singleOption[0]-$userId" ; ?>">
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
                            <button type="submit" class="button is-success vote" data-target-poll="<?= $pollId?>">Submit</button>
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
