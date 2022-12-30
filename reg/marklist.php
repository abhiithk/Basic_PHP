<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marklist</title>
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
    $result = $dbObj->getRow('users', 'id', $id);
    ?>
    <div class="px-4 pt-6 sm:px-6 lg:px-8">
        
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">MARKS</h1>               
                <p class="mt-2 text-sm text-gray-700"> List of Marks in all Semesters</p> <br>
                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800"><?php echo $result['first_name'] . ' ' . $result['last_name'] ?></span>
                <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-0.5 text-sm font-medium text-red-800"><?php echo $result['email'] ?></span>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="marks.php?id=<?php echo $_GET['id'] ?>"><button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Enter Marks</button>
                    <a href="list.php"><button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 sm:w-auto">Student's List</button>
                    </a> <br> <br>
                    <a href="sclist.php"> &ensp; &ensp;&ensp;&ensp; <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-0.5 text-sm font-medium text-yellow-800">Students and courses</span>
           </a> 
        </div>
        </div>
        <?php
        if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = '';
            }
            if ($action == 'success') {
                $showMsg = true;
                $msgTitle = 'Deleted';
                $msgTitleBgClr = 'bg-green-500';
                $msg = 'Data Deleted successfully';
                $msgBgClr = 'bg-green-100';
                $msgTitleClr = 'text-white';
                $msgClr = 'text-green-700';
                $msgBorder = ' border-green-400';
            } elseif ($action == 'failure') {
                $showMsg = true;
                $msgTitle = 'Not Deleted';
                $msgTitleBgClr = 'bg-red-500';
                $msg = 'Could not Delete data';
                $msgBgClr = 'bg-red-100';
                $msgTitleClr = 'text-white';
                $msgClr = 'text-red-700';
                $msgBorder = ' border-red-400';
            }
            elseif($action == 'updated'){
                $showMsg = true;
                $msgTitle = 'Updated';
                $msgTitleBgClr = 'bg-green-500';
                $msg = 'Data Updated successfully';
                $msgBgClr = 'bg-green-100';
                $msgTitleClr = 'text-white';
                $msgClr = 'text-green-700';
                $msgBorder = ' border-green-400';
            }
            elseif($action == 'failed'){
                $showMsg = true;
                $msgTitle = 'Not Updated';
                $msgTitleBgClr = 'bg-red-500';
                $msg = "Haven't updated any data";
                $msgBgClr = 'bg-red-100';
                $msgTitleClr = 'text-white';
                $msgClr = 'text-red-700';
                $msgBorder = ' border-red-400';
            }
            if ($showMsg == true) {
        ?> <br>
            <div class="px-4 py-2 font-bold <?php echo $msgTitleClr; ?> <?php echo $msgTitleBgClr; ?> rounded-t">
                <?php echo $msgTitle; ?>
            </div>
            <div class="px-4 py-3 <?php echo $msgClr; ?> <?php echo $msgBgClr; ?> border border-t-0 <?php echo $msgBorder; ?>rounded-b">
                <p><?php echo $msg; ?></p>
            </div>
        <?php
        }
        ?>
        <br>
        <form method="POST" action="marklist.php?id=<?php echo $_GET['id'] ?>">
            <div class="grid grid-cols-6 gap-1">
            <?php
                            $dbObj =  new dbOperation();
                            $result = $dbObj->getTable('courses');
                            //print_r($result); exit;
                            ?>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="course" class="block text-sm font-medium text-gray-900"> Course </label>
                                <select id="course" name="course" autocomplete="sem" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <?php foreach ($result as $course) { ?>
                                        
                                        <option value="<?php echo $course['id'] ?>"> <?php echo $course['course_name'] ?> </option>                                    
                                    <?php } ?>
                                </select>
                            </div>
                <div class="px-4 py-4 text-right bg-blue-300 sm:px-6">
                    <input type="submit" id="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2" value="Submit" name="submit">
                </div>
            </div>
        </form>

        <?php
        if ($_POST) {
            $id = $_GET['id'];
            $course = $_POST['course'];
            $dbObj =  new dbOperation();
            $arrWhere = array('user_id', 'course');
            $arrValue = array($id, "'$course'");
            //print_r($arrValue); exit;
            $result = $dbObj->getTable('marks', $arrWhere, $arrValue, 'semester');
            //print_r($result); exit;
        ?>
            <div class="flex flex-col mt-8">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl.NO</th>
                                        
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Semester</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"> Subject</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mark</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Subject</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mark</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Subject</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mark</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>

                                        </th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                ?>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    foreach ($result as $data) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"><?php echo $i ?></td>
                                           
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['semester'] ?></td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['subject1'] ?></td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['mark1'] ?></td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo  $data['subject2'] ?></td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['mark2'] ?></td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo  $data['subject3'] ?></td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['mark3'] ?></td>
                                            <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                <a href="marks.php?update_id=<?php echo $data['id'] ?>&&id=<?php echo $data['user_id'] ?>" class="text-indigo-600 hover:text-indigo-900">EDIT<span class="sr-only"></span></a> |
                                                <a href="marklist.php?delete_id=<?php echo $data['id'] ?>&&id=<?php echo $data['user_id'] ?>" class="text-red-600 hover:text-red-900"> DELETE <span class="sr-only"></span> </a>
                                                <!-- to pass id -->

                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }

        if (isset($_GET['delete_id'])) {
            //echo $_GET['delete_id'];exit;          
            $dbObj = new dbOperation();
            $tid = $_GET['delete_id'];
            $result = $dbObj->delete('marks', 'id', $tid);

            if ($result == 1) {
                //echo $id; exit;
                echo '<script type="text/JavaScript">
           location.href = "http://localhost/forms/reg/marklist.php?id=' . $id . '&&action=success"
                   </script>';
            } else {
                echo '<script type="text/JavaScript">
            location.href = "http://localhost/forms/reg/marklist.php?id=' . $id . '&&action=failure"
                    </script>';
            }
            
        }
            ?>
    </div>

    </div>
    </div>
</body>

</html>