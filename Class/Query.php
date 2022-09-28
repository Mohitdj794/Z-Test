<?php
require_once '../connection.php';

class Query extends Connection
{
    // properties 
    protected $table;

    public function displayThis()
    {

        $sql = "SELECT * FROM Test_Title";

        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $str = '';

            while ($row = $result->fetch_assoc()) {
                $str .= "<tr>
                <td>{$row['TestTitle']}</td>
                <td>{$row['TestDuration']} min</td>
                <td><a class=\"delet\" style=\"text-decoration:none\" href=\"AddtestQuestions.php?id={$row['Test_id']}\">Add Questions</a></td>
                <td><a class=\"delet\" style=\"text-decoration:none\" href=\"/Php-Project/View/view.php?id={$row['Test_id']}\">View Test</a></td>
                <td><a class=\"delet\" style=\"text-decoration:none\" href=\"Delete.php?id={$row['Test_id']}\">Delete</a></td>
            </tr>";
            }
            return $str;
        } else {
            echo "result 0";
        }
    }




    public function DeleteThis($d)
    {
        $d1 = (int)$d;
        $sql = "DELETE From Test_Title where Test_id={$d1}";
        if ($this->con->query($sql)) {
            header("LOCATION:/Php-Project/View/ViewCourse.php");
        } else {
            echo "Test Data are here so you can't Delete the Course";
        }
    }


    public function CreatCourse($name, $time)
    {
        $sql = "INSERT INTO Test_Title(TestTitle ,TestDuration)VALUES('{$name}','{$time}')";
        if ($this->con->query($sql) === true) {

            header('Location:/Php-Project/View/ViewCourse.php');
        } else {
            echo $this->con->error;
        }
    }


    public function  AddTest($submit, $name, $id, $option, $Ans)
    {

        if (isset($submit)) {

            $sql = "INSERT INTO Test_Question(Question,Test_id)VALUES('{$name}','{$id}')";
            $this->con->query($sql);
            $last_id = $this->con->insert_id;
            echo $last_id;

            $arr = $option;
            $count = 1;
            $result = [];
            foreach ($arr as $key => $value) {
                $result["Option$count"] = $value;
                $count++;
            }

            $exam = json_encode($result);

            $sql2 = "INSERT INTO Test_Result(Options,Answer,Question_id)Values('$exam','{$Ans}',$last_id)";

            if ($this->con->query($sql2) == true); {
                header("LOCATION:/Php-Project/View/ViewCourse.php");
                die();
            }
            echo "error";
        }
    }


    public function ViewTest($id)
    {
        $sql = "SELECT Test_Title.TestTitle,Test_Title.TestDuration,Test_Question.Question_id,Test_Question.Question,Test_Result.Options,Test_Result.Answer FROM Test_Title INNER JOIN Test_Question ON Test_Title.Test_id=Test_Question.Test_id INNER JOIN Test_Result ON Test_Question.Question_id=Test_Result.Question_id where Test_Title.Test_id={$id}";

        $i = 0;
        $result1 = $this->con->query($sql);
        $v = $result1->fetch_assoc();
        echo "<h1>{$v['TestTitle']}</h1> <br>";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $var = json_decode($row['Options'], true);
                $str = "";

                foreach ($var as $key => $value) {
                    $str .= "<input type='radio' id='html' name='fav_language'>" . $value . "<br>";
                }



                echo $i = 1 + $i . ")  " . $row['Question']
                    . "<br>" . "<br>" . "   " . $str . "<br> "
                    . "   <p class='Answer'>Answer: {$row['Answer']}</p>"
                    . "<a class=\"delet\" style=\"text-decoration:none\" href=\"EditQuestion.php?id={$row['Question_id']}\">Edit</a> <br> <br>";
            }
        }
    }

    public function EditTest($id)
    {
        $sql = "SELECT Test_Question.Question,Test_Result.Options,Test_Result.Answer from Test_Question INNER JOIN Test_Result ON Test_Question.Question_id=Test_Result.Question_id where Test_Question.Question_id={$id}";

        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $var = json_decode($row['Options'], true);
                $str = "";
                echo "<p><label>Question</label></p>
                       <textarea  name='Question' class='Que' rows='10' cols='70'>{$row['Question']}</textarea> <br>
                         ";

                echo "<p>Options</p>";

                $count = 1;
                foreach ($var as $key => $value) {
                    $str .= "<input type='text' name='Option$count' value='$value'><br>";
                    $count++;
                }

                echo $str . "<br>";

                echo "<p>Answer</p><input type='text' name='Answer' value='{$row['Answer']}'>";
            }
        }
    }
    public function UpdateTest($submit, $Question, $Answer, $id)
    {

        if (isset($submit)) {

            $sql = "UPDATE Test_Question SET Question='{$Question}' where Question_id={$id}";
            $this->con->query($sql);

            $obj = $_REQUEST;
            print_r($obj);
            $Option = [];
            foreach ($obj as $key => $value) {
                if (substr($key, 0, 6) == "Option") {
                    $Option["$key"] = $value;
                }
            }
            $r = json_encode($Option);
            print_r($r);


            $sql1 = "Select Test_id from Test_Question where Question_id={$id}";
            $result = $this->con->query($sql1);
            $x = $result->fetch_all(MYSQLI_ASSOC);
            print_r($x);
            $sql2 = "UPDATE Test_Result SET Options='$r',Answer= '{$Answer}' where Question_id={$id}";

            if ($this->con->query($sql2) == true); {
                header("LOCATION:view.php?id={$x[0]["Test_id"]}");
                die();
            }
            echo "error";
        }
    }


    public function SearchCourse($search)
    {
        $sql = "SELECT * FROM Test_Title WHERE TestTitle LIKE '{$search}%' ";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $str = '';

            while ($row = $result->fetch_assoc()) {
                $str .= "<tr>
                        <td>{$row['TestTitle']}</td>
                        <td>{$row['TestDuration']} min</td>
                        <td><a class=\"delet\" style=\"text-decoration:none\" href=\"AddtestQuestions.php?id={$row['Test_id']}\">Add Questions</a></td>
                        <td><a class=\"delet\" style=\"text-decoration:none\" href=\"/Php-Project/View/view.php?id={$row['Test_id']}\">View Test</a></td>
                        <td><a class=\"delet\" style=\"text-decoration:none\" href=\"Delete.php?id={$row['Test_id']}\">Delete</a></td>
                    </tr>";
            }
            return $str;
        } else {
            echo "result 0";
        }
    }

    // User return Exam data add fetch 
    // add data table name and array of data;

        public function addExamResult(string $table, array $data)
        {
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
            . "VALUES ('" . implode("', '", $val) . "')";
                 if ($this->con->query($sql) === TRUE) {
                    $last_id = $this->con->insert_id;
                    return $last_id;
                  } else {
                    echo "Error: " . $sql . "<br>" . $this->con->error;
                  }
        }


        // fetch single data only result table

        public function singleRowDataFromResult(int $id)
        {
          $sql = "SELECT * FROM result WHERE id = $id";
          $stmt = $this->con->query($sql);
            if ($stmt->num_rows > 0)
            $result = $stmt->fetch_assoc();
            else $result = [];
            return $result;
        }

        // this method get the userName to return the data what are the exam he/she taken and result

        public function fetchUserDetailFromExamDetail()
        {
            $sql = "select examMaintain.examTitle, result.result, result.score, result.startTime, result.endTime, result.date FROM examMaintain JOIN result ON examMaintain.ID = result.examMaintain_id where examMaintain.userName = 'sangeeth '";
            $stmt = $this->con->query($sql);
            if ($stmt->num_rows > 0 )
            $result = $stmt->fetch_all(MYSQLI_ASSOC);
            else $result = [];
            return $result;
        }
}
