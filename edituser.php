<?php
include 'Components/sql_connect.php';
session_start();
$user = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE uname='$user'";
$res = ($conn->query($sql))->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Any Post-Signup</title>
    <?php include 'Components/head.php' ?>
    <script type="text/javascript">
    </script>
</head>

<body>
    <header class="bg-dark">
        <button class="home btn btn-info" onclick="{location.href='index.php'}"><i class="fa fa-home"></i></button>
        <h2 class="text-center" onclick="scrollup()">
            <span>Any Post
                <i class="fa fa-pencil"></i>
            </span>
        </h2>
        <div class="btn-group setting-btn">
            <button type="button" class="btn btn-danger rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item text-info" href="user.php?user=<?php echo $_SESSION['user']; ?>"><i class="fa fa-eye"></i> View Profile</a>
                <a class="dropdown-item text-info" href="edituser.php"><i class="fa fa-edit"></i> Edit Profile</a>
                <div class='dropdown-divider'></div>
                <a class="dropdown-item text-danger" href="backend/logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
            </div>
        </div>
    </header>
    <div class="container main w-75">
        <div>
            <form class="w-100 pt-4" autocomplete="off" method="POST" action="backend/updateUserInfo.php">
                <h3 class="mx-auto w-50">
                    <center>Edit Details</center>
                </h3>
                <div class="container w-50 form-box">
                    <input id="uname" style="background: #fff;" value="<?php echo $res['uname']; ?>" class="form-control mt-4" placeholder="User Name" name="uname" type="text" disabled />
                    <input id="email" style="background: #fff;" value="<?php echo $res['email']; ?>" class="form-control mt-4" placeholder="Email ID" name="email" type="email" disabled />
                    <div class="row">
                        <div class="col-sm">
                            <input id="fname" style="background: #d2d2ff;" value="<?php echo $res['fname']; ?>" class="form-control mt-4" placeholder="First Name" name="fname" type="text" required />
                        </div>
                        <div class="col-sm">
                            <input id="lname" style="background: #d2d2ff;" value="<?php echo $res['lname']; ?>" class="form-control mt-4" placeholder="Last Name" name="lname" type="text" required />
                        </div>
                    </div>
                    <input type="submit" value="Save" class="btn btn-success mt-3" />
                    <input type="button" value="Cancel" onclick="window.history.back()" class="btn btn-danger mt-3" />
                </div>
                <div>&nbsp;</div>
            </form>
        </div>
    </div>

</body>

</html>