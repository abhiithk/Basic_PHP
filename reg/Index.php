<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="bg-slate-100">
  <?php include 'db_connection.php'; ?>

  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>
  <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
          <p class="mt-1 text-sm text-slate-600">Enter your personal information</p>
        </div> <br>
      </div>
      <?php
      $showMsg = false;
      if (!$_POST) {
        $fname = $lname = $email = $phone = $street = $city = $state = $zip = $hobbie = $dob = '';
        if (isset($_GET['id']))
          $id = $_GET['id'];
        else
          $id = '';
        if ($id != '') {
          $query = "select * from users where id=$id";
          $result = mysqli_query($conn, $query);
          $rows = mysqli_fetch_assoc($result);
          //print_r($rows); exit;
          $fname = $rows['first_name'];
          $lname = $rows['last_name'];
          $email = $rows['email'];
          $phone = $rows['mobile'];
          $street = $rows['address'];
          $city = $rows['city'];
          $state = $rows['state'];
          $zip = $rows['zip_code'];
          $hobbie = $rows['hobbies'];
          $dob = $rows['dob'];
          $country = $rows['country_code'];
        }
      ?>
        <div class="mt-5 md:col-span-2 md:mt-0">
          <form id="form1" method="POST" action="Index.php">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First name*</label>
                    <input type="text" value="<?php echo $fname ?>" name="first_name" id="first_name" autocomplete="given_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                    <input type="text" value="<?php echo $lname ?>" name="last_name" id="last_name" autocomplete="family_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
                    <input type="text" value="<?php echo $email ?>" name="email" <?php if ($id != '') echo 'readonly' ?> id="email" autocomplete="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile NO*</label>
                    <input type="text" value="<?php echo $phone ?>" name="mobile" id="mobile" autocomplete="mobile_no" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6">
                    <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                    <input type="text" value="<?php echo $street ?>" name="street_address" id="street_address" autocomplete="street_address" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" value="<?php echo $city ?>" name="city" id="city" autocomplete="address-level2" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                    <input type="text" value="<?php echo $state ?>" name="region" id="region" autocomplete="address-level1" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                    <input type="text" value="<?php echo $zip ?>" name="postal_code" id="postal_code" autocomplete="postal_code" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="hobbie" class="block text-sm font-medium text-gray-700">Hobbies (Seperate using ,)</label>
                    <input type="text" value="<?php echo $hobbie ?>" name="hobbies" id="hobbies" autocomplete="hobbie" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="dob" class="block text-sm font-medium text-gray-700">Date Of Birth</label>
                    <input type="date" value="<?php echo $dob ?>" name="dob" id="dob" autocomplete="hobbie" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <select id="country" value="<?php echo $country_code ?>" name="country" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      <option value="1">India</option>
                      <option value="2">USA</option>
                      <option value="3">Canada</option>
                      <br>
                    </select>
                  </div>
                </div>

                <br>
                <div>
                  <fieldset>
                    <div class="col-span-6 space-x-3 sm:col-span-3">
                      <input id="sub" value="1" name="intrst" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                      <label for="sub" class="font-medium text-gray-700 select-none">Interested in recieving Emails</label>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="px-4 py-3 text-right bg-gray-50">
                <input type="hidden" id="hidden" name="id" value="<?php echo $id ?>">
                <a href="table.php" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> Table</a>
                <input type="button" id="submit_button" onclick="submitFn()" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" value="Submit" name="form_submit">
              </div>
            </div>
          </form>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php
  if ($_POST) {

    $countries = array('1' => 'India', '2' => 'USA', '3' => 'Canada');
    //echo $_POST['dob']; exit;
  ?>
    <div class="wrapper">
      <?php
      $fname = $_POST['first_name'];
      $lname = $_POST['last_name'];
      $email = $_POST['email'];
      $phone = $_POST['mobile'];
      $street = $_POST['street_address'];
      $city = $_POST['city'];
      $state = $_POST['region'];
      $zip = $_POST['postal_code'];
      $hobbie = $_POST['hobbies'];
      $dob = ($_POST['dob'] == '') ? '0000-00-00' : $_POST['dob'];
      $country = $_POST['country'];
      $id = $_POST['id'];
      if ($id == '') {
        $sql = "select count(id) as email_count FROM users WHERE email='$email'"; //query to take count of email
        $res = mysqli_query($conn, $sql); //runs the query
        $row = mysqli_fetch_assoc($res); //fetches  
        if ($row['email_count'] == 0) {
          $sql = "INSERT INTO users(first_name,last_name,email,mobile,address,city,state,zip_code,hobbies,dob,country_code) 
                        VALUES ('$fname', '$lname', '$email', '$phone', '$street', '$city', '$state', '$zip', '$hobbie', '$dob', '$country')";
          // echo $sql; exit;
          if (mysqli_query($conn, $sql)) {
            //echo "Record inserted successfully";
            $showMsg = true;
            $msgTitle = 'Sucess';
            $msgTitleBgClr = 'bg-green-500';
            $msg = 'Data added successfully';
            $msgBgClr = 'bg-green-100';
            $msgTitleClr = 'text-white';
            $msgClr = 'text-green-700';
            $msgBorder = ' border-green-400';
          } else {
            echo "Could not insert record: " . mysqli_error($conn);
          }
          mysqli_close($conn);
        } else {
          $showMsg = true;
          $msgTitle = 'Error';
          $msgTitleBgClr = 'bg-red-500';
          $msg = 'Email already exists';
          $msgBgClr = 'bg-red-100';
          $msgTitleClr = 'text-white';
          $msgClr = 'text-red-700';
          $msgBorder = ' border-red-400';
        }
      } else {
        $sql = "UPDATE users SET first_name = '$fname',last_name='$lname',address='$street', city='$city',state='$state',zip_code='$zip',hobbies='$hobbie',dob='$dob',country_code='$country' where id= $id";
        //echo $sql; exit;
        if (mysqli_query($conn, $sql)) {
          $showMsg = true;
          $msgTitle = 'Updated';
          $msgTitleBgClr = 'bg-green-500';
          $msg = 'Data Updated successfully';
          $msgBgClr = 'bg-green-100';
          $msgTitleClr = 'text-white';
          $msgClr = 'text-green-700';
          $msgBorder = ' border-green-400';
        } else {
          $showMsg = true;
          $msgTitle = 'Not Updated';
          $msgTitleBgClr = 'bg-red-500';
          $msg = 'Could not Update data';
          $msgBgClr = 'bg-red-100';
          $msgTitleClr = 'text-white';
          $msgClr = 'text-red-700';
          $msgBorder = ' border-red-400';
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
  ?>
  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>
  <div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Applicant Information</h3>
      <p class="max-w-2xl mt-1 text-sm text-gray-500">Personal details</p>
    </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
      <dl class="sm:divide-y sm:divide-gray-200">
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Full name</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <?php echo $_POST['first_name'] . ' ' . $_POST['last_name']; ?></dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Email</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            if (ctype_lower($_POST['email'])) {
              echo $_POST['email'];
            } else {
              echo strtolower($_POST['email']);
            }
            ?> </dd>

        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Mobile Number</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            echo $_POST['mobile'];
            ?></dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Address</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?php echo $_POST['street_address'] . ' ' . $_POST['city'] . ' ' . $_POST['region'];
                                                                        ?></dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Postal Code</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <?php
                                                                        echo $_POST['postal_code'];
                                                                        ?>
          </dd>
          </dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Hobbies</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            $arrHobbies = (explode(",", $_POST['hobbies']));
            foreach ($arrHobbies as $hobby) {
              echo $hobby . "<br />";
            }
            ?>
          </dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            if ($dob != '0000-00-00') {
              echo date('d/F/Y', strtotime($_POST['dob']));
            }
            ?>
          </dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Age</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            $dob = $_POST['dob'];
            $year = (date('Y') - date('Y', strtotime($dob)));
            echo "Your age is " . $year . " years.";
            ?>
          </dd>
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Country</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            echo $countries[$_POST['country']];
            ?>
          </dd>
          </dd>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <?php
            if ($_POST['intrst'] === '1') {
              echo "Interested in receiving Mails";
            } else {
              echo "Not interested in receiving Mails";
            }
            ?>
          </dd>
          <div class="px-4 py-5 border-t border-gray-200 sm:p-0"> </div>
        </div>
      </dl>
      <a href="Index.php" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> Back </a>
    </div>
  </div>
  </div>
<?php
  }
?>
<script>
  function submitFn() {
    var mobNum = document.getElementById("mobile").value;
    var mail = document.getElementById("email").value;
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var firName = document.getElementById("first_name").value;
    if (mobNum.length == '' || mobNum.length > 10) {
      alert(" Invalid number")
      return;
    } else if (!mail.match(pattern)) {
      alert(" Invalid Email")
      return;
    } else if (firName.length == '') {
      alert("Enter your name")
    } else {
      document.getElementById("form1").submit();
    }
  }
</script>
</body>

</html>