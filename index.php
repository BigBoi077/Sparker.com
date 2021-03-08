<?php require_once "app/log-in-redirect.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/components/meta.php"; ?>
</head>
<body>
    <div class="container mt-4 mb-4">
        <?php include_once "app/components/header.php"; ?>
        <div class="columns mt-1 is-centered">
            <div class="column is-three-fifths">
                <?php include_once "app/components/errors.php"; ?>
                <form class="box" action="app/verifications/log-in-verification.php" method="post">
                    <div class="field">
                        <label class="label">Username</label>
                        <div class="control">
                            <input id="username" name="username" class="input" type="text" placeholder="C.Redfield">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input id="password" name="password" class="input" type="password" placeholder="********">
                        </div>
                    </div>
                    <a class="is-size-7-desktop d-block" href="sign-up.php">Don't have an account ? Sign up here</a>
                    <br>
                    <button class="button form-button">Log in</button>
                </form>
            </div>
        </div>
    </div>
    <?php include_once "app/components/footer.php"; ?>
</body>
</html>