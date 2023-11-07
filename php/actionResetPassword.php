<?php   
require('config.php');
if(isset($_GET['id'])){
    if(isset($_GET['type'])){
        if($_GET['type'] == 1){
            $type = 'customer';
            
        }
        elseif($_GET['type'] == 2){
            $type = 'admins';
        }
        $datas = getAllData($db, $type);
        foreach($datas as $data){
            if($data[$type.'_id'] == $_GET['id']){
                $dataId = $data[$type.'_id'];
            }
        }
    $_SESSION['dataId'] = $dataId;
    }
}
include('../layout/header.php');
?>
<div class="reset-password">
    <h2>Reset your Password</h2>
    <form action="actionResetPasswordConfirm.php" method="POST">
        <label for="password">New password</label>
        <input type="password" name="password" id="password">
        <label for="passwordConfirm">Confirm new password</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm">
        <input type="submit" value="Reset password">
    </form>
<?php include('../layout/footer.php'); ?>