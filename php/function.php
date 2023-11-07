<?php



function responseMessage(){
    if (!empty($_SESSION['response'])){
        header('Location: ../pages/login.php');
        exit;
    }
    elseif(!empty($_SESSION['error'])){
        header('Location: ../pages/register_data.php');
        exit;
    }
}
function responseFilter($tab, $filterName, $filter){
    if(!empty($tab)){   
        $_SESSION[$filterName] = $tab;
        header("Location: ../index.php?filter='".$filter."'");
        exit;
    }
    else {
        unset($_SESSION[$filterName]);
        $_SESSION['result'] = 'No result found';
    } 
}

function verifyUserType ($dataSession){
    if(!empty($dataSession['customer_id']) || !empty($dataSession['admin_id'])){
        if(!isset($dataSession['customerId']) || !empty($dataSession['customerId'])){
            $datas = getAllData($db, 'customers');
            foreach($datas as $data){
                if($data[$colName] == $dataSession[$id]){
                    $_SESSION['message'] = 'You are a customer';
                } 
                $_SESSION['error'] = 'You are not a customer';
            }
        }elseif(!isset($dataSession['adminId']) || !empty($dataSession['adminId'])){
            $datas = getAllData($db, 'admins');
            foreach($datas as $data){
                if($data[$colName] == $dataSession[$id]){
                    $_SESSION['message'] = 'You are a admin';
                } 
                $_SESSION['error'] = 'You are not a admin';
            }
        }
        responseMessage();
    }
}
