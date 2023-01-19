<?php


abstract class db

{
    private array $credentials = [
        'localhost' => 'localhost',
        'user'      => 'root',
        'password'  => 'root',
        'db'        => 'cv'
    ];
    protected object $connection;


    function __construct()
    {
        if ( ! isset($this->connection)) {
            $conn = new mysqli(
                $this->credentials['localhost'],
                $this->credentials['user'],
                $this->credentials['password'],
                $this->credentials['db']
            );
            if ($conn === false) {
                echo 'Connection file is bad';
            } else {
                $this->connection = $conn;
            }
        }
    }


    protected function queryHandler(string $query, bool $expectReturn = false, $dataArray = false, bool $multipleValues = false)
    {
        if ($dataArray) {
            $typeArray = [];
            foreach ($dataArray as $key => $value) {
                if (gettype($value) === 'integer') {
                    $typeArray[$key] = 'i';
                }
                if (gettype($value) === 'string') {
                    $typeArray[$key] = 's';
                }
            }
        }

        $stmt = $this->connection->prepare($query);
        if ($dataArray) {
            $stmt->bind_param(implode($typeArray), ...$dataArray);
        }
        $execute = $stmt->execute();
        if ($execute) {
            if ($expectReturn) {
                $getResult = $stmt->get_result();
                if ($multipleValues === false) {
                    return $getResult->fetch_assoc();
                } else {
                    $resultArr = [];
                    foreach ($getResult as $row) {
                        $resultArr[] = $row;
                    }

                    return $resultArr;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
?>