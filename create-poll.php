<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/meta.php"; ?>
</head>
<body>
<div class="container mt-4 mb-4">
    <?php include_once "app/header.php"; ?>
        <div class="columns mt-4 is-centered">
            <div class="column is-three-fifths">
                <form action="/app/poll-creation.php" id="create-poll" class="box mb-4 is-three-fifths" method="post">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="title">Poll title</label>
                                <div class="control">
                                    <input id="title" name="title" class="input" type="text" placeholder="What's the best fruit ?">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="description">Description</label>
                                <div class="control">
                                    <textarea class="textarea" id="description" name="description" type="text" placeholder="The dev team needs to know what's the best fruit to buy on their next grocery run."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column" id="input-fields">
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <input id="title" name="option-1" class="input" type="text" placeholder="Mango">
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <input id="title" name="option-2" class="input" type="text" placeholder="Banana">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column d-flex justify-content-center">
                            <button type="button" class="button is-success" id="add-option">
                                <span class="icon is-small">
                                  <i class="fas fa-plus-circle"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="button form-button center-button d-flex">Create poll</button>
                </form>
            </div>
        </div>
    </div>
<script type="module" src="/Sparker.com/javascripts/app.js"></script>
<?php include_once "app/footer.php"; ?>
</body>
</html>
