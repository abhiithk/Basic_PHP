<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Course List</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body  class="bg-blue-300">
<?php include 'db_connection.php'; ?>
    <div class="px-4 pt-6 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">LIST</h1>
            <p class="mt-2 text-sm text-gray-900">A list of all the Students and Courses</p>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="index.php"><button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto">Home</button>
          </a>
        </div>
        </div>
        <div class="flex flex-col mt-8">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 align-middle min-w-fit md:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="divide-y divide-gray-300 min-w-fit">
                  <thead class="bg-gray-50">
                    <tr class="divide-x divide-gray-300">
                      <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                      <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Course</th>
                
                    </tr>
                  </thead>
                  <?php
                  $query = "SELECT users.id, first_name, course_name FROM users LEFT JOIN marks ON  users.id = marks.user_id LEFT JOIN courses ON courses.id = marks.course GROUP BY (users.id)";
                  $result = mysqli_query($conn, $query);
                  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                   //print_r($rows); exit;
                   foreach ($rows as $data)
                   { ?>
                    <tbody class="bg-white divide-y divide-gray-300">
                    <tr class="divide-x divide-gray-300">
                      <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"><?php echo $data['first_name'] ?></td>
                      <td class="p-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $data['course_name'] ?></td>
                    </tr>
                  </tbody>
                    
                   <?php }
                  ?>
                 
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
</body>
</html>