<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/meta.php"; ?>
</head>
<body>
    <div class="container mt-4 mb-4">
        <?php include_once "app/header.php"; ?>
        <div class="columns is-centered">
            <div class="column is-three-fifths">
                <form class="box">
                    <div class="field">
                        <label class="label">Username</label>
                        <div class="control">
                            <input id="username" class="input" type="text" placeholder="C.Redfield">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input id="password" class="input" type="password" placeholder="********">
                        </div>
                    </div>
                    <a class="is-size-7-desktop d-block" href="sign-up.php">Don't have an acount ? Sign up here</a>
                    <br>
                    <button class="button form-button">Log in</button>
                </form>
            </div>
        </div>
    </div>
    <?php include_once "app/footer.php"; ?>
</body>
</html>