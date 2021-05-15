<?php
function _pre($arg = null){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

function returnMessage(Array $message = array(), String $path = null, Array $data = array()){
    if(isset($message) && count($message)){
        session()->set('error',$message);
    }
    if(isset($data) && count($data)){
        session()->set('returned', $data);
    }
    return redirect()->to(site_url($path));
}
function setToast(string $message = null, string $type= null){
    if(!isset($_SESSION['toast'])){
        $_SESSION['toast'] = array();
    }

    $_SESSION['toast'][] = array(
        'type' => $type,
        'message' => $message
    );
}

function has_fields($required_fields = array(),$data = array()){
    foreach($required_fields as $k => $v){
        if(!isset($data[$v]) or empty($data[$v])){
            return false;
        }    
    }
    return true;
}
function get_var($index, $data = array()){
    return isset($data[$index]) ?  $data[$index] : null;
}
function setIndexes($indexes = array(), $from = array()){
    $data = array();
    foreach($indexes as $k => $v){
        if(isset($from[$v]) && !empty($from[$v])){
            $data[$v] = $from[$v];
        }
    }
    return $data;
}

function makePaginationView($countRegisters = 0, $per_page = 0,$active_page = 0){
    $count_pages = ceil($countRegisters / $per_page);
    if($count_pages <= 1) return false;
    $pagination = '  <ul class="pagination" data-max-page="'.$count_pages.'">';

    if($count_pages > 3){
        $pagination .= '<li class="page-item">
        <a class="page-link previous-link" href="1" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>';
    }

    for($i = 0; $i < $count_pages; $i++){
        $pagination.= '<li class="page-item '.($i==$active_page ? "active" : "").'"><a data-index="'.$i.'" class="page-link default-link" href="#">'.($i+1).'</a></li>';
    }

    if($count_pages > 3){
        $pagination.= ' <li class="page-item">
        <a class="page-link next-link" href="'.$count_pages.'" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>';
    }

    $pagination.=' </ul>';

    return $pagination  ;
}

function reportData($data = array()){
    $_SESSION['data_sent'] = $data;
}

