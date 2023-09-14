<?php $connect = mysqli_connect("localhost","root","","rms") or die("connection failed") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Mangement System</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="header">
        <div class="logo"><h2>RMS</h2></div>

    </div>
    <div class="container">
        <div class="form">
            <form action="" method="post">
                <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder=" enter your name" class="control">
                </div>
                <div class="mb-3">
                <label for="contact">Contact</label>
                <input type="tel" name="contact" placeholder=" enter your contact" class="control">
                </div>  
                <div class="mb-3">
                <label for="father"> Father's Name</label>
                <input type="text" name="father" placeholder="enter your father's name" class="control">
                </div>
                <div class="mb-3">
                <label for="">Maths marks</label>
                <input type="number" name="maths" placeholder="maths marks" class="control">
                </div>
                <div class="mb-3">
                <label for="sci">Science marks</label>
                <input type="number" name="sci" placeholder=" Science marks" class="control">
                </div>
                <div class="mb-3">
                <label for="">sst marks</label>
                <input type="number" name="sst" placeholder="sst marks" class="control">
                </div>
                <div class="mb-3">
                <label for="">Hindi marks</label>
                <input type="number" name="hindi" placeholder="hindi marks" class="control">
                </div>
                <div class="mb-3">
                <label for="">English marks</label>
                <input type="number" name="eng" placeholder="eng marks" class="control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="create" value="Create Result record" class="btn">
                </div>
            </form>
            <?php
                // insert work

                if(isset($_POST['create'])){
                    $name = $_POST['name'];
                    $father = $_POST['father'];
                    $contact = $_POST['contact'];
                    $maths = $_POST['maths'];
                    $sci = $_POST['sci'];
                    $sst = $_POST['sst'];
                    $hindi = $_POST['hindi'];
                    $eng = $_POST['eng'];

                    $query = "insert into students (name, contact, father, maths, sst, sci , hindi, eng) value ('$name', '$contact' ,'$father', '$maths', '$sst', '$sci', '$hindi', '$eng')";

                    $run = mysqli_query($connect,$query);

                    if($run){
                        echo "<script>alert('successfully  inserted')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    else{
                        echo "<script>alert('failed')</script>";
                    }
                }


            ?>


        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Father's Name</th>
                        <th>Maths marks</th>
                        <th>Science marks</th>
                        <th>SST marks</th>
                        <th>Hindi marks</th>
                        <th>English marks</th>
                        <th>Total marks</th>
                        <th>Result</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "select * from students";
                        $run = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_array($run)){
                            $roll = $row['roll'];
                            $name = $row['name'];
                            $contact = $row['contact'];
                            $father = $row['father'];
                            $maths = $row['maths'];
                            $sci = $row['sci'];
                            $sst = $row['sst'];
                            $hindi = $row['hindi'];
                            $eng = $row['eng'];
                            $total = $maths + $sci + $sst + $hindi +$eng;
                            if($total>200){
                                $pass="Passed";
                            }else{
                                    $pass="Failed";
                            }
                            

                            echo "
                        <tr>    

                            <td>$roll</td>
                            <td>$name</td>
                            <td>$contact</td>
                            <td>$father</td>
                            <td>$maths </td>
                            <td>$sci</td>
                            <td>$sst </td>
                            <td>$hindi </td>
                            <td>$eng </td>
                            <td>$total </td>
                            <td>$pass </td>
                        </tr>
                            ";
                            
                        }
                    ?>
                </tbody>
                
            </table>
        </div>
    </div>
</body>
</html>