<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail List</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="bg-blue-300">
    <?php
    $showMsg = false;
    include 'db_connection.php';
    $query = "select * from users";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($rows); exit;
    ?>
    <div class="px-4 pt-6 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Students</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the students in the account</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="Index.php"><button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Registration</button>
                </a>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Sl.NO</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">First_name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Last_Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">E-mail</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mobile</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DOB</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>

                                    </th>
                                </tr>
                            </thead>
                            <?php
                            $i = 0;
                            foreach ($rows as $data) {
                                $i++;
                            ?>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"><?php echo $i ?></td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['first_name'] ?></td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['last_name'] ?></td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['email'] ?></td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['mobile'] ?></td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo date('d/M/Y', strtotime($data['dob'])); ?></td>
                                        <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                            <a href="Index.php?id=<?php echo $data['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only"></span></a> |
                                            <a href="list.php?id=<?php echo $data['id'] ?>&&action='delete'" class="text-red-600 hover:text-red-900">Delete<span class="sr-only"></span></a>|
                                            <a href="marklist.php?id=<?php echo $data['id'] ?>" class="text-green-600 hover:text-green-900">Marks<span class="sr-only"></span></a>
                                            <!-- to pass id -->
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            if (isset($_GET['action']))
                                $action = $_GET['action'];
                            else
                                $action = '';

                            if (isset($_GET['id']))
                                $id = $_GET['id'];
                            else
                                $id = '';
                            if ($id !== '' && $action = 'delete') {
                                $query = "DELETE FROM users WHERE id = $id";
                                // echo $query; exit;
                                $result = mysqli_query($conn, $query);
                                //print_r($result) ; exit;
                                $affected_rows = mysqli_affected_rows($conn);
                                // echo $rows; exit;
                                if ($affected_rows == 1) {
                                    echo '<script type="text/JavaScript">
                                    location.href = "http://localhost/forms/reg/list.php? action=success";
                                     </script>';
                                } else {
                                    echo '<script type="text/JavaScript">
                                     location.href = "http://localhost/forms/reg/list.php? action=failure";
                                     </script>';
                                }
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
                ?>

                </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>