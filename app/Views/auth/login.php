<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/output.css">
    <title>Login</title>
</head>

<body>
    <?php
    $session = session();
    $login = $session->getFlashdata('login');
    $username = $session->getFlashdata('username');
    $password = $session->getFlashdata('password');
    ?>

    <?php if ($username) { ?>
        <p style="color:red"><?php echo $username ?></p>
    <?php } ?>

    <?php if ($password) { ?>
        <p style="color:red"><?php echo $password ?></p>
    <?php } ?>

    <?php if ($login) { ?>
        <p style="color:green"><?php echo $login ?></p>
    <?php } ?>

    <section class="h-screen">
        <div class="container px-6 py-12 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="w-full" alt="Phone image" />
                </div>
                <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
                    <form action="<?= base_url(); ?>/login/process" method="POST">
                        <?= csrf_field(); ?>
                        <!-- Username input -->
                        <div class="mb-6">
                            <input type="username" name="username" id="username" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Username" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password" name="password" id="password" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Password" />
                        </div>

                        <div class="flex justify-between items-center mb-6">
                            <div class="form-group form-check">
                                <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Don't have an account? <a href="<?= base_url(); ?>/register">Register Now</a></label>
                            </div>
                            <a href="#!" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button name="login" id="login" type="submit" value="Login" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full">
                            Sign in
                        </button>




                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>