<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="bg-orange-400">
    <?php
    include 'db_connection.php';
    $query = "select * from users";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($rows); exit;
    ?>
    <div class="px-4 pt-6 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users in the account</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
               <a href="Index.php"><button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Go Back</button>
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
                            $i=0;
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
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><?php  echo date('d/M/Y', strtotime($data['dob']));?></td>
                                        <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                            <a href="Index.php?id=<?php echo $data['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only"></span></a>  |
                                            <a href="#" class="text-red-600 hover:text-red-700">Delete<span class="sr-only"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
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