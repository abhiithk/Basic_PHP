<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Document</title>
    <link href="./css/tailwind.css" rel="stylesheet">
</head>
<body>
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Applicant Information</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Full name</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <?php echo $_POST['first-name']; 
               echo $_POST['last-name'];?></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0" ><?php echo $_POST['email']; ?></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Mobile Number</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?php echo $_POST['mobile']; ?></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Street Address</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?php echo $_POST['street-address'];
              echo $_POST['city'];  
              echo $_POST['region'];
               ?></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Postal Code</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?php echo $_POST['postal-code']; ?></dd></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Country</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?php echo $_POST['country']; ?></dd></dd>
            </div>    
          </dl>
        </div>
      </div>
      <a href="Index.php" class=" block text-sm font-medium text-gray-700"> Home </a>
</body>
</html>