<?php
// If the form is submitted, display a new page
if (isset($_POST['submit'])) {
    // sanitize input
    $name   = htmlspecialchars($_POST['name']);
    $email  = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $course = htmlspecialchars($_POST['course']);

    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Registration Success</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(135deg, #e3f2fd, #bbdefb);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                overflow: hidden;
            }
            .container {
                background: white;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                width: 400px;
                text-align: center;
            }
            h2 { color: #0d47a1; }
            p { font-size: 15px; color: #333; text-align:left; margin-left:20px;}
            button {
                margin-top: 20px;
                padding: 10px 20px;
                background: #0d47a1;
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
            }
            button:hover { background: #1565c0; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>🎉 Registration Successful!</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Gender:</strong> $gender</p>
            <p><strong>Course:</strong> $course</p>
            <button onclick=\"window.location.href='reg.php'\">Go Back</button>
        </div>
    </body>
    </html>";
    exit; // Stop further code execution after showing success page
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Registration Form</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle at center, #bbdefb, #90caf9, #64b5f6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            width: 400px;
            z-index: 10;
            position: relative;
        }

        h2 { text-align: center; color: #0d47a1; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #90caf9;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #0d47a1;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover { background: #1565c0; }

        /* sparkle particle */
        .sparkle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: radial-gradient(circle, white, rgba(255,255,255,0));
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.9;
            animation: sparkleFade 1s ease-out forwards;
        }

        @keyframes sparkleFade {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(2); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form id="regForm" method="post" action="reg.php">
            <label>Name:</label>
            <input type="text" id="name" name="name" required>

            <label>Email:</label>
            <input type="email" id="email" name="email" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <label>Course:</label>
            <select name="course" required>
                <option value="">Select Course</option>
                <option>10th</option>
                <option>12th</option>
                <option>B.Com</option>
                <option>Bachelor's Degree</option>
                <option>B.Tech CSE</option>
                <option>M.Tech</option>
            </select>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <script>
        // Create sparkles on mouse move
        document.addEventListener("mousemove", function(e) {
            for (let i = 0; i < 3; i++) { // multiple sparkles per move
                const sparkle = document.createElement("div");
                sparkle.classList.add("sparkle");
                document.body.appendChild(sparkle);

                // randomize nearby position
                const offsetX = (Math.random() - 0.5) * 20;
                const offsetY = (Math.random() - 0.5) * 20;
                sparkle.style.left = `${e.pageX + offsetX}px`;
                sparkle.style.top = `${e.pageY + offsetY}px`;

                // remove after animation
                setTimeout(() => {
                    sparkle.remove();
                }, 1000);
            }
        });

        // Simple form validation
        document.getElementById("regForm").addEventListener("submit", function(e) {
            if (document.getElementById("name").value === "" || document.getElementById("email").value === "") {
                alert("Please fill all required fields!");
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
