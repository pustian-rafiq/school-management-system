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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
    <table id="customers">
        <tr>
            <td>
                <h2>Tesla Coder</h2>
            </td>
            <td>
                <h2>Khanjia High School</h2>
                <p>Kaliganj,Satkhira</p>
                <p>Email: <strong>rafiqul.pust.cse@gmail.com</strong> </p>
                <p>Phone: <strong>01991166550</strong> </p>
            </td>
        </tr>
    </table>

    <table id="customers">
        <tr>
            <th width="10%">SL No.</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Student Name</td>
            <td>{{ $studentDetails->student->name }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Student ID No</td>
            <td>{{ $studentDetails->student->id_no }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Student Roll</td>
            <td>{{ $studentDetails->roll }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Father Name</td>
            <td>{{ $studentDetails->student->father_name }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Mother Name</td>
            <td>{{ $studentDetails->student->mother_name }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Mobile</td>
            <td>{{ $studentDetails->student->mobile }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Address</td>
            <td>{{ $studentDetails->student->address }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Gender</td>
            <td>{{ $studentDetails->student->gender }}</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Religion</td>
            <td>{{ $studentDetails->student->religion }}</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Date Of Birth</td>
            <td>{{ $studentDetails->student->dob }}</td>
        </tr>
        <tr>
            <td>11</td>
            <td>Discount</td>
            {{-- <td>{{ $studentDetails->discount->discount }}</td> --}}
        </tr>
        <tr>
            <td>12</td>
            <td>Year</td>
            <td>{{ $studentDetails->student_year->name }}</td>
        </tr>
        <tr>
            <td>13</td>
            <td>Class</td>
            <td>{{ $studentDetails->student_class->name }}</td>
        </tr>
        <tr>
            <td>14</td>
            <td>Group</td>
            <td>{{ $studentDetails->student_group->name }}</td>
        </tr>
        <tr>
            <td>15</td>
            <td>Shipt</td>
            <td>{{ $studentDetails->student_shift->name }}</td>
        </tr>
    
    </table>

</body>
</html>


