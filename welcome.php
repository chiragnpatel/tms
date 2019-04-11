<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}

if ($_SESSION['user']['role'] == 'customer') {
    header("Location: customer-dashboard.php");
}
if ($_SESSION['user']['role'] == 'transportadmin') {
    header("Location: transportadmin-dashboard.php");
}

if (isset($_POST['role'])) {
    try {
        $userId = $_SESSION['user']['id'];
        $role = $_POST['role'];

        $sql = 'UPDATE tbl_users SET `role`=\'' . $role . '\'  WHERE `id`= ' . $userId;
        $stmt = $DB->prepare($sql);

        $stmt->execute();
        if ($role == 'customer') {
            header("Location: customer-dashboard.php");
        } else {
            header("Location: transportadmin-dashboard.php");
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

include './header.php';
?>
    <div class="page-header">
        <h1>
            Welcome
            <span class="pull-right">
    </span>
        </h1>
    </div>
    <div class="clearfix"></div>
<?php if ($msg <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <p><?php echo $msg; ?></p>
    </div>
<?php } ?>

    <div class="container">
        <?php if (($_SESSION['user']['role'] != 'customer') && ($_SESSION['user']['role'] != 'transportadmin'))  : ?>
            <form action="#" method="post">
                <h1>For what purpose you are here ?</h1>
                <div class="margin5">
                    <input type="radio" name="role" value="customer"/>
                    <label>Become a customer.</label>
                </div>
                <div class="margin5">
                    <input type="radio" name="role" value="transportadmin"/>
                    <label>Want to add transport agency.</label>
                </div>
                <div class="margin5">
                    <input type="submit" name="formSubmit" value="Submit" class="btn btn-primary"/>
                </div>

            </form>
        <?php endif; ?>

    </div>

<?php
include './footer.php';
?>