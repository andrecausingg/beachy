<?php
    if(isset($_POST["searchName"]) || isset($_POST["startDate"]) || isset($_POST["endDate"])){
        $classSearch = new classSearch($_POST["searchName"], $_POST["startDate"], $_POST["endDate"]);
        $classSearch->getSearch();
    }

class classSearch{
    private $searchName;
    private $startDate;
    private $endDate;

    function __construct($searchName, $startDate, $endDate){
        $this->searchName = $searchName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    function getSearch(){
        // File Connection Database
        require_once("../helper/database-connection/connectionHF.php");

        // CLASS Connection on Database 
        $classDataBaseConnection = new classDataBaseConnection();

        $search = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->searchName);
        $searchStartDate = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->startDate);
        $searchEndDate = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->endDate);
        
        if($this->searchName != "" && $this->startDate !="" && $this->endDate){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee BETWEEN '$searchStartDate' AND '$searchEndDate' AND (tpt_drivers_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != "" && $this->startDate !=""){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee = '$searchStartDate' AND (tpt_drivers_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != "" && $this->endDate !=""){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee = '$searchEndDate' AND (tpt_drivers_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->startDate !="" && $this->endDate != ""){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee BETWEEN '$searchStartDate' AND '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != ""){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE (tpt_drivers_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->startDate !=""){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee = '$searchStartDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->endDate != ""){
            $query = " SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName == "" || $this->startDate == "" || $this->endDate == ""){
            $query = " SELECT * FROM tradjeep_payroll_tbl";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["tpt_drivers_name"] .'</td>
                            <td>' . $row["tpt_plate_num"] .'</td>
                            <td>' . $row["tpt_daily_butaw"] .'</td>
                            <td>' . $row["tpt_savings"] .'</td>
                            <td>' . $row["tpt_terminal_fee"] .'</td>
                            <td>' . $row["tpt_monthly_butaw"] .'</td>
                            <td>' . $row["tpt_membership"] .'</td>
                            <td>' . $row["tpt_others"] .'</td>
                            <td>' . $row["tpt_remarks"] .'</td>
                            <td>' . $row["tpt_time"] .'</td>
                            <td>' . $row["tpt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }
    }
}
?>