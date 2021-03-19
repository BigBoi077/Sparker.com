<div id="graph-container"></div>
<?php

function generateOptions($database, $pollId, $offset)
{
    $index = 0;
    $options = getAccordingOptionsForPoll($database, $pollId);
    foreach ($options as $singleOption) {
        if ($index + 1 == count($options)) {
            echo "'$singleOption[$offset]'";
        } else {
            echo "'$singleOption[$offset]'" . ",";
        }
        $index++;
    }
}

function generateNumberOptions($database, $pollId, $offset)
{
    $index = 0;
    $options = getAccordingOptionsForPoll($database, $pollId);
    foreach ($options as $singleOption) {
        if ($index + 1 == count($options)) {
            echo $singleOption[$offset];
        } else {
            echo $singleOption[$offset] . ",";
        }
        $index++;
    }
}

function generateTitle($database, $pollId)
{
    echo getAccordingTitleForPoll($database, $pollId);
}

function generateRandomColors($database, $pollId)
{
    $options = getAccordingOptionsForPoll($database, $pollId);
    $nbrOptions = count($options);
    for ($index = 0; $index <= $nbrOptions; $index++) {
        if ($index == $nbrOptions) {
            echo getRandomColor();
        } else {
            echo getRandomColor() . ",";
        }
        $index++;
    }
}

function getRandomColor(): string
{
    $color1 = rand(1, 255);
    $color2 = rand(1, 255);
    $color3 = rand(1, 255);
    return "'rgba($color1, $color2, $color3, 0.2)'";
}

?>

<script src="/Sparker.com/javascripts/vendor/Chart.bundle.min.js"></script>
<script type="text/javascript">
    const container = document.getElementById("graph-container");

    <?php
        $database = buildDatabase();
        $allPollIds = getAllPollIds();
        $nbrPolls = count($allPollIds);

        ?>

    function createCanvas(id) {
        const canvas = document.createElement("canvas");
        canvas.id = id;
        canvas.width = 200;
        canvas.height = 100;
        container.append(canvas);
    }

    <?php

        for ($index = 0; $index < $nbrPolls; $index++) {?>
            createCanvas(<?php echo $index; ?>)
        <?php } ?>
        let ctx = null;
        let chart = null;
        <?php

        for ($index = 0; $index < $nbrPolls; $index++) { ?>

            ctx = document.getElementById(<?php echo $index; ?>).getContext('2d');
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php generateOptions($database, $allPollIds[$index][0], 1); ?>],
                    datasets: [{
                        label: '<?php generateTitle($database, $allPollIds[$index][0]); ?>',
                        data: [<?php generateNumberOptions($database, $allPollIds[$index][0], 3); ?>],
                        backgroundColor: [<?php generateRandomColors($database, $allPollIds[$index][0]); ?>],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        <?php }
        $database->close();
    ?>

</script>