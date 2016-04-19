<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 6/04/2016
 * Time: 4:46 PM
 */

    require_once("db.php");

    function get_enrolments($user){

        $db = connect_db();
        $userid = get_userid($user);

        $enrol = "SELECT * FROM ENROLLED WHERE studentid='" . $userid . "'";
        $enrolres = exec_state($enrol);
        $enrolstore = array();
        $counter= 0;

        while($row = mysqli_fetch_assoc($enrolres)){
            $enrolstore[$counter]['classname'] = $row['classname'];
            $enrolstore[$counter]['classcode'] = $row['classcode'];
            $counter++;
        }

        return $enrolstore;

    }

    function get_userid($user){
        $sql = "SELECT studentid FROM LOGIN WHERE username='" . $user . "'";
        $result = exec_state($sql);
        $counter = 0;
        $myres = array();
        $userid;
        while($row = mysqli_fetch_assoc($result)){
            $userid = $row['studentid'];
        }
        return $userid;
    }

    function output_class_code(){

        $db = connect_db();
        $sql = "SELECT * FROM CLASSES";
        $result = exec_state($sql);

        $counter = 0;
        $myres = array();
        while($row = mysqli_fetch_assoc($result)){

            $myres[$counter]['classcode'] = $row['classcode'];
            $myres[$counter]['classname'] = $row['classname'];
            $myres[$counter]['coursename'] = $row['coursename'];
            $counter++;
        }

        return $myres;
    }

    function get_user_info()
    {
        $user = $_SESSION['username'];
        $sql = "SELECT * FROM STUDENT JOIN LOGIN ON STUDENT.studentid=LOGIN.studentid WHERE LOGIN.username='" . $user . "'";
        $result = exec_state($sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    function class_count($val){
        $sql = "SELECT CLASSES.classcode, CLASSES.classname, COUNT(*) total
        FROM ENROLLED JOIN CLASSES ON ENROLLED.classcode=CLASSES.classcode
        WHERE CLASSES.classcode LIKE '%" . $val . "%' OR CLASSES.classname LIKE '%" . $val . "%'
        GROUP BY CLASSES.classname";
        $result = exec_state($sql);

        $counter = 0;
        $myres = array();
        while($row = mysqli_fetch_assoc($result)){
            $myres[$counter]['classcode'] = $row['classcode'];
            $myres[$counter]['classname'] = $row['classname'];
            $myres[$counter]['total'] = $row['total'];
            $counter++;
        }
        return $myres;

    }

    function prof_name($fname, $sname){
        $sql = "SELECT STUDENT.fname, STUDENT.sname
        FROM STUDENT JOIN ENROLLED ON STUDENT.studentid=ENROLLED.studentid JOIN CLASSES ON ENROLLED.classcode=CLASSES.classcode JOIN PROFESSOR ON CLASSES.professorid=PROFESSOR.professorid
        WHERE PROFESSOR.fname LIKE '%" . $fname . "%' AND PROFESSOR.sname LIKE '%" . $sname . "%'";
        $result = exec_state($sql);
        $myres = get_name_res($result);
        return $myres;
    }

    function prof_number($val){
        $sql = "SELECT COUNT(*) FROM PROFESSOR WHERE schoolname LIKE '%" . $val . "%'";
        $result = exec_state($sql);
        $myres = mysqli_fetch_assoc($result);
        return $myres;
    }


    function course_number($val){
        $sql = "SELECT COUNT(*) FROM STUDENT WHERE coursename LIKE '%" . $val . "%'";
        $result = exec_state($sql);
        $myres = mysqli_fetch_assoc($result);
        return $myres;
    }

    function check_professors($value){

        $sql = "SELECT fname, sname FROM PROFESSOR WHERE schoolname LIKE '%" . $value  . "%'";
        $result = exec_state($sql);
        $myres = get_name_res($result);
        return $myres;

    }

    function check_course_students($value){
        $sql = "SELECT fname, sname FROM STUDENT WHERE coursename LIKE '%" . $value . "%'";
        $result = exec_state($sql);
        $myres = get_name_res($result);
        return $myres;
    }

    function check_schools($name){
        $sql = "SELECT * FROM DEPARTMENT WHERE schoolname LIKE '%" . $name . "%'";
        $result = exec_state($sql);
        $myres = get_dept_res($result);
        return $myres;
    }


    function exec_state($sqlstate){
        $db = connect_db();
        $result = mysqli_query($db, $sqlstate);

        return $result;

    }

    function get_name_res($result){
        $counter = 0;
        $myres = array();
        while($row = mysqli_fetch_assoc($result)){
            $myres[$counter]['fname'] = $row['fname'];
            $myres[$counter]['sname'] = $row['sname'];
            $counter++;
        }
        return $myres;
    }


    function get_dept_res($result){
        $counter = 0;
        $myres = array();
        while($row = mysqli_fetch_assoc($result)){
            $myres[$counter]['departmentname'] = $row['departmentname'];
            $counter++;
        }
        return $myres;
    }
?>