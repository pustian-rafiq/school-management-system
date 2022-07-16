<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/upload/easyschool.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">
                </h2>
            </td>
            <td style="margin-bottom:0px">
                <h2>Khanjia High School</h2>
                <p>Nalta Road,Khanjia, Kaliganj, Satkhira</p>
                <p>Phone : 01991166550</p>
                <p>Email : khs@gmail.com</p>
                <p> <b> Student Exam Fee</b> </p>
             </td> 
        </tr>
    </table>

    @php 
    $registrationfee = App\Models\StudentFeeAmount::where('fee_category_id','4')->where('class_id',$allStudentDetails->class_id)->first();
    $originalfee = $registrationfee->amount;
            $discount = $allStudentDetails['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

    @endphp 

    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Student ID No</b></td>
            <td>{{ $allStudentDetails['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Roll No</b></td>
            <td>{{ $allStudentDetails->roll }}</td>
        </tr>

            <tr>
            <td>3</td>
            <td><b>Student Name</b></td>
            <td>{{ $allStudentDetails['student']['name'] }}</td>
        </tr>

       
        <tr>
            <td>4</td>
            <td><b>Session</b></td>
            <td>{{ $allStudentDetails['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Class </b></td>
            <td>{{ $allStudentDetails['student_class']['name'] }}</td>
        </tr>
        
        <tr>
            <td>6</td>
            <td><b>Exam Fee </b></td>
            <td>{{ $discount  }} %</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Discount Fee </b></td>
            <td>{{ $discount  }} %</td>
        </tr>

            <tr>
            <td>8</td>
            <td><b>Fee For this Student of {{$exam_type}} </b></td>
            <td>{{ $finalfee }} $</td>
        </tr>
    </table>
    <br>  
    <i style="font-size: 10px; float: right">Print Data : {{ date("d M Y") }}</i>

    <hr style="border: solid 1px #000; width: 95%; color: #000000; margin-bottom: 20px; margin-top:15px">

    <table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>Student ID No</b></td>
            <td>{{ $allStudentDetails['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Roll No</b></td>
            <td>{{ $allStudentDetails->roll }}</td>
        </tr>

            <tr>
            <td>3</td>
            <td><b>Student Name</b></td>
            <td>{{ $allStudentDetails['student']['name'] }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td><b>Session</b></td>
            <td>{{ $allStudentDetails['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Class </b></td>
            <td>{{ $allStudentDetails['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Exam Fee</b></td>
            <td>{{ $originalfee }} $</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Discount Fee </b></td>
            <td>{{ $discount  }} %</td>
        </tr>

            <tr>
            <td>8</td>
            <td><b>Fee For this Student of {{$exam_type}} </b></td>
            <td>{{ $finalfee }} $</td>
        </tr> 
    </table>
    <br> 
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
