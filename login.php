<?php
session_start();
// although 2nd and 3rd line is not needed session_destroy() is needed,
// but just to be extra sure that no session remains in the cache.
$_SESSION = array();
unset($_SESSION);
session_destroy();
require_once './config.php';
if (isset($_POST["sub"])) {
    require_once "phpmailer/class.phpmailer.php";

    $pass = trim($_POST["pass1"]);
    $email = trim($_POST["uemail"]);
    $sql = "SELECT * from tbl_users where email = :email_id and pass = :pass";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":email_id", $email);
        $stmt->bindValue(":pass", md5($pass));
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result) > 0) {
            //if ($result[0]['status'] == 'approved') {
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $result[0];
            if ($_SESSION['user']['role'] == 'admin') {
                header('Location: admin-dashboard.php');
            } else {

                header('Location: welcome.php');
            }
            exit;
//      }
//      else {
            $msg = "Please verify your email to login to your account";
            $msgType = "warning";
//      }
        } else {
            $msg = "Invalid credentials!";
            $msgType = "warning";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

include './header.php';
?>
    <div class="page-header">
        <h1>Login</h1>
    </div>
    <div class="clearfix"></div>
<?php if ($msg <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <p><?php echo $msg; ?></p>
    </div>
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="well contact-form-container">
                    <form class="form-horizontal contactform" action="login.php" method="post" name="f"
                          onsubmit="return validateForm();">
                        <fieldset>

                            <div class="form-group">
                                <label class="col-lg-12 control-label" for="uemail">Email:
                                    <input type="text" placeholder="Your Email" id="uemail" class="form-control"
                                           name="uemail">
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-12 control-label" for="pass1">Password:
                                    <input type="password" placeholder="Password" id="pass1" class="form-control"
                                           name="pass1">
                                </label>
                            </div>

                            <div style="height: 10px;clear: both"></div>

                            <div class="form-group">
                                <div class="col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="sub">Login</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function validateForm() {

            var your_email = $.trim($("#uemail").val());
            var pass1 = $.trim($("#pass1").val());


            // validate email
            if (!isValidEmail(your_email)) {
                alert("Enter valid email.");
                $("#uemail").focus();
                return false;
            }

            // validate subject
            if (pass1 == "") {
                alert("Enter password");
                $("#pass1").focus();
                return false;
            } else if (pass1.length < 6) {
                alert("Password must be atleast 6 character.");
                $("#pass1").focus();
                return false;
            }

            return true;
        }

        function isValidEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }


    </script>

<?php
include './footer.php';
?>
