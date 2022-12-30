<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marks Update</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="bg-blue-300">
    <?php
    $showMsg = false;
    include 'dbOperation.php';
    if (isset($_GET['id']))
        $id = $_GET['id'];
    else
        $id = '';
    $dbObj =  new dbOperation();
    $userInfo = $dbObj->getRow('users', 'id', $id);
    //echo $query; exit;
    //print_r ($userInfo); exit;
    if (isset($_GET['update_id'])) {
        $upid = $_GET['update_id'];
        //echo $uid;exit;             
    } else {
        $upid = '';
    }
    if ($upid != '') {  //get the existing data
        $dbObj = new dbOperation();
        $result = $dbObj->getRow('marks', 'id', $upid);
        //print_r($result); exit;
        $uid = $_GET['id'];
        $course = $result['course'];
        $sem =  $result['semester'];
        $sub1 = $result['subject1'];
        $sub2 = $result['subject2'];
        $sub3 = $result['subject3'];
        $mark1 = $result['mark1'];
        $mark2 = $result['mark2'];
        $mark3 = $result['mark3'];
        $uFields = 'user_id, course, subject1, subject2, subject3, mark1, mark2, mark3';
        $uValues = "$uid, '$course', '$sub1', '$sub2', '$sub3', $mark1, $mark2, $mark3";
    } else {

        $course = $sem = $sub1 = $sub2 = $sub3 = $mark1 = $mark2 = $mark3 = '';
    }

    if (isset($_POST['submit'])) { //submit the form
        //print_r($_POST); exit;

        $upid = $_POST['update_id'];
        $uid = $_GET['id'];
        $course = $_POST['course'];
        $sem =  $_POST['sem'] ?? null;
        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
        $mark1 = $_POST['mark1'];
        $mark2 = $_POST['mark2'];
        $mark3 = $_POST['mark3'];
        $semseter = array('1' => 'I', '2' => 'II', '3' => 'III', '4' => 'VI');

        if ($upid == '') {
            if ($uid != '') {
                $dbObj1 = new dbOperation();
                $arrWhere = array('user_id', 'course', 'semester');
                $arrValue = array($uid, "'$course'", $sem);
                $result = $dbObj1->getCount('marks', 'semester', $arrWhere, $arrValue,);
                //print_r($result) ; exit;
            }

            if ($result['count'] == 0) {
                $fields = 'user_id, course, semester, subject1, subject2, subject3, mark1, mark2, mark3';
                $values = "$uid, '$course', '$sem', '$sub1', '$sub2', '$sub3', $mark1, $mark2, $mark3";

                $dbObj = new dbOperation();
                $result = $dbObj->insert('marks', $fields, $values);
                header("Location: marklist.php?id= $uid");
                //echo $result; exit;
            } else {
                $showMsg = true;
                $msgTitle = 'Error';
                $msgTitleBgClr = 'bg-red-500';
                $msg = 'Semester details already exists';
                $msgBgClr = 'bg-red-100';
                $msgTitleClr = 'text-white';
                $msgClr = 'text-red-700';
                $msgBorder = ' border-red-400';
            }
        } else {
            //$fields = 'subject1, subject2, subject3, mark1, mark2, mark3';
            $fieldValues = "subject1='$sub1', subject2='$sub2', subject3='$sub3', mark1=$mark1, mark2=$mark2, mark3=$mark3";
            $dbObj = new dbOperation();
            $result =  $dbObj->update('marks', $fieldValues, 'id', $upid);
            //header("Location: marklist.php?id= $uid");
            if ($result == 1) {
                //echo $id; exit;
                echo '<script type="text/JavaScript">
           location.href = "http://localhost/forms/reg/marklist.php?id=' . $uid . '&&action=updated"
                   </script>';
            } else {
                echo '<script type="text/JavaScript">
            location.href = "http://localhost/forms/reg/marklist.php?id=' . $uid . '&&action=failed"
                    </script>';
            }
        }

        if ($showMsg == true) {
    ?>
            <div class="px-4 py-2 font-bold <?php echo $msgTitleClr; ?> <?php echo $msgTitleBgClr; ?> rounded-t">
                <?php echo $msgTitle; ?>
            </div>
            <div class="px-4 py-3 <?php echo $msgClr; ?> <?php echo $msgBgClr; ?> border border-t-0 <?php echo $msgBorder; ?>rounded-b">
                <p><?php echo $msg; ?></p>
            </div>
            </div>
    <?php
        }
    }
    ?>
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:col-span-9 lg:px-0">
            <form action="marks.php?id=<?php echo $_GET['id'] ?>" method="POST">
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">Mark Details</h1>
                                <p class="mt-2 text-sm text-gray-700">Enter your Mark Details </p>
                                <br>

                                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800"><?php echo $userInfo['first_name'] . ' ' . $userInfo['last_name'] ?></span>
                                <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-0.5 text-sm font-medium text-red-800"><?php echo $userInfo['email'] ?></span>
                            </div>

                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <a href="index.php"><button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto">Home</button>
                                </a>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6">

                            <?php
                            $dbObj =  new dbOperation();
                            $result = $dbObj->getTable('courses');
                            //print_r($result); exit;

                            ?>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="course" class="block text-sm font-medium text-gray-900"> Course</label>
                                <select id="course" <?php if ($upid != '') echo 'disabled' ?> name="course" autocomplete="sem" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <?php foreach ($result as $course) { ?>
                                        
                                        <option value="<?php echo $course['id'] ?>" <?php if ($course == $course['id']) echo 'selected' ?>><?php echo $course['course_name'] ?> </option>
                                      

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="semester" class="block text-sm font-medium text-gray-900">Semester</label>
                                <select id="semester" <?php if ($upid != '') echo 'disabled' ?> name="sem" autocomplete="sem" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">

                                    <option value="1" <?php if ($sem == '1') echo 'selected' ?>>I</option>
                                    <option value="2" <?php if ($sem == '2') echo 'selected' ?>>II</option>
                                    <option value="3" <?php if ($sem == '3') echo 'selected' ?>>III</option>
                                    <option value="4" <?php if ($sem == '4') echo 'selected' ?>>IV</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="sub1" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" value="<?php echo $sub1 ?>" name="sub1" id="sub1" autocomplete="sub1" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="mark1" class="block text-sm font-medium text-gray-700"> Mark</label>
                                <input type="text" value="<?php echo $mark1 ?>" name="mark1" id="mark1" autocomplete="mark1" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            &nbsp;
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="sub2" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" value="<?php echo $sub2 ?>" name="sub2" id="sub2" autocomplete="sub2" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="mark2" class="block text-sm font-medium text-gray-700"> Mark</label>
                                <input type="text" value="<?php echo $mark2 ?>" name="mark2" id="mark2" autocomplete="mark2" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            &nbsp;
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="sub3" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" value="<?php echo $sub3 ?>" name="sub3" id="sub3" autocomplete="sub3" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="mark3" class="block text-sm font-medium text-gray-700"> Mark</label>
                                <input type="text" value="<?php echo $mark3 ?>" name="mark3" id="mark3" autocomplete="mark3" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <input type="hidden" id="update_id" name="update_id" value="<?php echo $upid ?>">
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="submit" name="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-900 bg-green-500 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Save</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</body>

</html>