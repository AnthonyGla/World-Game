<?php
class Database
{
    /**
     * @var PDO
     * @access private
     */
    private $PDOInstance = null;

    /**
     * @var BDD
     * @access private
     * @static
     */
    private static $instance = null;

    /**
     * @var string
     */
    const DEFAULT_SQL_USER = 'root';

    /**
     * @var string
     */
    const DEFAULT_SQL_HOST = 'localhost';

    /**
     * @var string
     */
    const DEFAULT_SQL_PASS = 'Anthony123-';

    /**
     * @var string
     */
    const DEFAULT_SQL_DTB = 'project';

    /**
     * Constructeur
     *
     * @param void
     * @return void
     * @see PDO::__construct()
     * @access private
     */
    private function __construct()
    {
        $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
    }
    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }
    public function prepare($query)
    {
        return $this->PDOInstance->prepare($query);
    }
}
