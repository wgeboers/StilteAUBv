<?php
    $output = '';
    require_once('crud.php');
    $crud= new Crud('root', '');
    if(isset($_POST["export_excel"])){
        
        $searchData = $crud->getTable('searchhistories');

        if($searchData > 0){
            $output .= '
                <table class="table" bordered="1">
                    <tr>
                        <th>SearchID</th>
                        <th>Search_Description</th>
                        <th>Passed</th>
                        <th>Creation_Date</th>
                    </tr>
            ';
            foreach($searchData as $rows){
                $output .= '
                    <tr>
                        <td>'.$rows->SearchID.'</td>
                        <td>'.$rows->Search_Description.'</td>
                        <td>'.$rows->Passed.'</td>
                        <td>'.$rows->Creation_Date.'</td>
                    </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attechment; filename=SearchHistory.xls");
            echo $output;
        }
    }

    if(isset($_POST['delete_searchterms'])) {
        $crud->delete('searchhistories', NULL, NULL);
        
        if(isset($_SESSION['url'])) {
            $url = $_SESSION['url'];
        } else {
            $url = "/stilteaubv/searchtermsView.php";
        }
        header("Location: https://localhost$url");
        exit();
    }

    

?>