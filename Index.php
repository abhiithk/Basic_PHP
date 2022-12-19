<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <link href="./css/tailwind.css" rel="stylesheet">
</head>

<body class="bg-slate-100">
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
          <p class="mt-1 text-sm text-gray-600">Enter your personal informations</p>
        </div>
      </div>
      <?php
      if (!$_POST['form_submit']) {
      ?>
        <div class="mt-5 md:col-span-2 md:mt-0">
          <form id="form1" method="POST" action="Index.php">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First name*</label>
                    <input type="text" name="first_name" id="first_name" autocomplete="given_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                    <input type="text" name="last_name" id="last_name" autocomplete="family_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
                    <input type="text" name="email" id="email" autocomplete="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile NO*</label>
                    <input type="text" name="mobile" id="mobile" autocomplete="mobile_no" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6">
                    <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                    <input type="text" name="street_address" id="street_address" autocomplete="street_address" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                    <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                    <input type="text" name="postal_code" id="postal_code" autocomplete="postal_code" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <select id="country" name="country" autocomplete="country-name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      <option value="1">India</option>
                      <option value="2">USA</option>
                      <option value="3">Canada</option>
                    </select>
                  </div>
                </div>
                <br>
                <div>
                  <fieldset>
                    <div class="col-span-6 space-x-3 sm:col-span-3">
                      <input id="sub" name="intrst" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                      <label for="sub" class="font-medium text-gray-700 select-none">Interested in recieving Emails</label>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
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
    print_r($_POST);
    $countries = array('1' => 'India', '2' => 'USA', '3' => 'Canada');
  ?>
    <div class="wrapper">
      <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200"></div>
        </div>
      </div>
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Applicant Information</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
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
                if (strlen($_POST['mobile'] < 13)) {
                  echo $_POST['mobile'];
                } else {
                  echo "Invalid Mobile Number";
                }
                ?></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Address</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?php echo $_POST['street-address'] . ' ' . $_POST['city'] . ' ' . $_POST['region'];
                                                                            ?></dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Postal Code</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <?php
                                                                            if (strlen($_POST['postal_code'] < 7)) {
                                                                              echo $_POST['postal_code'];
                                                                            } else {
                                                                              echo "Invalid ZIP";
                                                                            }
                                                                            ?>
              </dd>
              </dd>
            </div>
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Country</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                <?php
                echo $countries[$_POST['country']];
                ?>
              </dd>
              </dd><dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <?php if ($_POST['intrst'] ==='on') {
              echo "Interested in recieving Mails";
              }
              else{
                echo "Not interested in receiving mails";
              } 
              ?> </dd>

              <div class="border-t border-gray-200 px-4 py-5 sm:p-0"> </div>
              
            </div>
            </dl>
          <a href="Index.php" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> Back </a>
        </div>
      </div>
    </div>
  <?php } ?>
  <script>
    function submitFn() {
      var mobNum = document.getElementById("mobile").value;
      var mail = document.getElementById("email").value;
      var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
      var firName=document.getElementById("first_name").value;
      if (mobNum.length == '' || mobNum.length > 10) {
        alert(" Invalid number")
        return;
      }
      else if(!mail.match(pattern)) {
        alert(" Invalid Email")
        return;
      }
      else if(firName.length=='')
      {
        alert("Enter your name")
      }
      else {
        document.getElementById("form1").submit();
      }
    }
  </script>
</body>

</html>