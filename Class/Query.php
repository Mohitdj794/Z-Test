<?php
/**
 * Require use to create the connection
 * 
 * PHP version 7.4.3
 * 
 * @category  PHP
 * @package   WordPress_Custom_Fields_Permalink
 * @author    vignesh <vignesh@ziffity.com>
 * @copyright 2014 Ziffity
 * @license   git@github.com:Mohitdj794/Z-Test.git git
 * @link      http://pear.php.net/package/PHP_CodeSniffer 
 */

require '../connection.php';

/**
 * This is the base class of data query 
 * All the function like add,delete,insert etc...
 * 
 * PHP version 7.4.3
 * 
 * @category  PHP
 * @package   WordPress_Custom_Fields_Permalink
 * @author    vignesh <vignesh@ziffity.com>
 * @copyright 2014 Ziffity
 * @license   git@github.com:Mohitdj794/Z-Test.git git
 * @link      http://pear.php.net/package/PHP_CodeSniffer 
 */

class Query extends Conn
{

    /**
     * Following this function to display the
     * 
     * @return string
     */
    public function displayThis()
    {
        $result =  $this->con->from('Test_Title')
            ->select()
            ->all();
        $object = json_decode(json_encode($result), true);
        $str = "";
        foreach ($object as $key => $row) {
            $str .= "<tr>
                <td>{$row['TestTitle']}</td>
                <td>{$row['TestDuration']} min</td>
                <td><a class=\"delet\" style=\"text-decoration:none\" href=\"AddtestQuestions.php?id={$row['Test_id']}\">Add Questions</a></td>
                <td><a class=\"delet\" style=\"text-decoration:none\" href=\"/Z-Test/View/view.php?id={$row['Test_id']}\">View Test</a></td>
                <td><a class=\"delete\" style=\"text-decoration:none\" href=\"Delete.php?id={$row['Test_id']}\">Delete</a></td>
            </tr>";
        }
        return $str;
    }

    /**
     * Following this function to 
     * 
     * @param $d get id to delete the paticular row
     * 
     * @return ""
     */
    public function DeleteThis($d)
    {
        $d1 = (int)$d;
        $result = $this->con->from('Test_Title')
            ->where('Test_id')->is($d1)
            ->delete();

        if ($result) {
            header('Location:/Z-Test/View/ViewCourse.php');
        } else {
            echo "fille";
        }
    }

    /**
     * Following this function to
     * 
     * @param $name 
     * @param $time 
     * 
     * @return void
     */
    public function CreatCourse($name, $time)
    {
        $result = $this->con->insert(array('TestTitle' => "{$name}",'TestDuration' => "{$time}"))
            ->into('Test_Title');
        return $result;
    }

    /**
     * Following this function to
     * 
     * @param $submit 
     * @param $name 
     * @param $id 
     * @param $option 
     * @param $Ans 
     * 
     * @return ""
     */
    public function  AddTest($submit, $name, $id, $option, $Ans)
    {

        if (isset($submit)) {

            $result = $this->con->insert(array(
                'Question' => "$name",
                'Test_id' => "$id"
            ))
                ->into('Test_Question');

            $last_id = $this->con->from('Test_Question')->max('Question_id');

            $arr = $option;
            $count = 1;
            $result = [];
            foreach ($arr as $key => $value) {
                $result["Option$count"] = $value;
                $count++;
            }

            $exam = json_encode($result);
           
            foreach ($arr as $key1=> $val) {
                if($val==$Ans){
                    $result1 = $this->con->insert(array(
                        'Options' => "$exam",
                        'Answer' => "$Ans",
                        'Question_id' => "$last_id"
                    ))
                        ->into('Test_Result');
                    header("LOCATION:/Z-Test/View/ViewCourse.php");
                }
                }
                
            }
            echo "The answer is in correct";
            
        }
       
    





    /**
     * Following this function to
     * 
     * @param $id 
     * 
     * @return ""
     */
    public function ViewTest($id)
    {
        $result = $this->con->from('Test_Title')->join('Test_Question', function ($join) {
                $join->on('Test_Title.Test_id', 'Test_Question.Test_id');
        })
            ->join('Test_Result', function ($join) {
                $join->on('Test_Question.Question_id', 'Test_Result.Question_id');
            })
            ->where('Test_Title.Test_id')->is($id)
            ->select()
            ->all();
        $object = json_decode(json_encode($result), true);
        $i = 0;
        $str1 = "";
        foreach ($object as $key => $v) {
            $str1 = "<h1>{$v['TestTitle']}</h1> <br>";
        }
        echo $str1;
        foreach ($object as $key => $row) {

            $var = json_decode($row['Options'], true);
            $str = "";

            foreach ($var as $key => $value) {
                $str .= " ~> " . $value . "<br>";
            }
            echo $i = 1 + $i . ")  " . $row['Question']
                . "<br>" . "<br>" . "   " . $str . "<br> "
                . "   <p class='Answer'>Answer: {$row['Answer']}</p>"
                . "<a class=\"delet\" style=\"text-decoration:none\" href=\"EditQuestion.php?id={$row['Question_id']}\">Edit</a> <br> <br>";
        }
    }

    /**
     * Following this function to
     * 
     * @param $id 
     * 
     * @return ""
     */
    public function EditTest($id)
    {
        $result = $this->con->from('Test_Question')
            ->join('Test_Result', function ($join) {
                $join->on('Test_Question.Question_id', 'Test_Result.Question_id');
            })
            ->where('Test_Question.Question_id')->is($id)
            ->select()
            ->all();
        $object = json_decode(json_encode($result), true);
        foreach ($object as $key => $row) {
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

    /**
     * Following this function to
     * 
     * @param $submit 
     * @param $Question 
     * @param $Answer  
     * @param $id 
     * 
     * @return void
     */
    public function UpdateTest($submit, $Question, $Answer, $id)
    {
        if (isset($submit)) {
            $result = $this->con->update('Test_Question')
                ->where('Question_id')->is($id)
                ->set(array(
                    'Question' => "$Question"
                ));
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
            $x = "";
            $result3 = $this->con->from('Test_Question')
                ->where('Question_id')->is($id)
                ->select()
                ->all();
            foreach ($result3 as $user) {
                $x = $user->Test_id;
            }
            echo $x;
            $result1 = $this->con->update('Test_Result')
                ->where('Question_id')->is($id)
                ->set(array(
                    'Options'  => "$r",
                    'Answer' =>  "$Answer"
                ));
            if ($result1 == true); {
                header("LOCATION:view.php?id={$x}");
                die();
            }
            echo "error";
        }
    }

    /**
     * Following this function to
     * 
     * @param $search 
     * 
     * @return void
     */
    public function SearchCourse($search)
    {
        $result = $this->con->from('Test_Title')
            ->where('TestTitle')->like("{$search}%")
            ->select()
            ->all();
        if ($result == []) {
            echo "Zero Result";
        } else {
            $object = json_decode(json_encode($result), true);
            $str = "";
            foreach ($object as $key => $row) {
                $str .= "<tr>
                    <td>{$row['TestTitle']}</td>
                    <td>{$row['TestDuration']} min</td>
                    <td><a class=\"delet\" style=\"text-decoration:none\" href=\"AddtestQuestions.php?id={$row['Test_id']}\">Add Questions</a></td>
                    <td><a class=\"delet\" style=\"text-decoration:none\" href=\"/Z-Test/View/view.php?id={$row['Test_id']}\">View Test</a></td>
                    <td><a class=\"delete\" style=\"text-decoration:none\" href=\"Delete.php?id={$row['Test_id']}\">Delete</a></td>
                </tr>";
            }
            return $str;
        }
    }



    /**
     * User return Exam data add fetch 
     * add data table name and array of data;
     * 
     * @param $table which table the data is inserted
     * @param $data  array of data it have key and value
     * 
     * @return int
     */
    public function addExamResult(string $table, array $data)
    {
        if ($table == "examMaintain") {
            $id = "ID";
        } else {
            $id = "id";
        }
        $result = $this->con->insert($data)
            ->into($table);

        if ($result === true) {

            $last_id = $this->con->from($table)->max($id);

            return $last_id;
        } else {
            echo "Error: " . "<br>" . $this->con->error;
        }
    }



    /**
     * Fetch single data only result table
     * 
     * @param $table also table name
     * @param $row   coloum name
     * @param $id    the value
     * 
     * @return mixed
     */
    public function singleRowDataFromResult(string $table, string $row, int $id)
    {
        $result = $this->con->from($table)
            ->where($row)->is($id) //Alternatively: ->where('age')->ne(18)
            ->select()
            ->all();
        return $result;
    }


    
    /**
     * Following this function to
     * 
     * @param $name the userName use to fetch the result
     *  
     * @return mixed
     */
    public function fetchUserDetailFromExamDetail($name)
    {
        $result = $this->con->from('examMaintain')
            ->join(
                'result', 
                function ($join) {
                        $join->on('examMaintain.ID', 'result.examMaintain_id');
                }
            )
            ->where(
                'examMaintain.userName'
            )
                ->is($name)->select(
                    ['examMaintain.examTitle', 'result.result', 'result.score', 'result.startTime', 'result.endTime', 'result.date']
                )
            ->all();

        return $result;
    }



    /**
     * Fetch data from Test_Title ;
     * 
     * @return array
     */
    public function testTitleData()
    {
        $result = $this->con->from('Test_Title')
            ->select()
            ->all();
        return $result;
    }



    /**
     * Fetch particular exam detail
     * 
     * @param $id the id use to fetch the result
     * 
     * @return mixed
     */
    public function fetchDataFromExamDetail($id)
    {
        $result = $this->con->from('Test_Title')
            ->join(
                'Test_Question', function ($join) {
                     $join->on('Test_Title.Test_id', 'Test_Question.Test_id');
                }
            )
            ->join(
                'Test_Result', function ($join) {
                    $join->on(
                        'Test_Question.Question_id', 'Test_Result.Question_id'
                    );
                }
            )
            ->where('Test_Title.Test_id')->is($id)
            ->select(
                ['Test_Title.TestTitle', 
                'Test_Title.TestDuration', 
                'Test_Question.Question_id', 
                'Test_Question.Question', 
                'Test_Result.Options', 
                'Test_Result.Answer'
                ]
            )
            ->all();

        return $result;
    }
}
