<?php

class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=dbno1";
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    public function all(...$arg)
    {
        $sql = "select * from `$this->table`";

        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join("&&", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($arg)
    {
    }
    public function save(...$arg)
    {
    }
    public function del($arg)
    {
    }
    public function count(...$arg)
    {
    }

    protected function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
    }
}

function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=dbno1";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
function to($url)
{
    header("location:" . $url);
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
