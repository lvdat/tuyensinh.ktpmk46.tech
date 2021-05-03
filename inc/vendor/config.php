<?
class DB
{
/* Tác giả: Mrken
 * Website: https://phonho.net
 *
 * class Xử lý dữ liệu
*/
    private static $__instance = null;
    
    private $__connect;
    
    private $__queryCount = 0;
    
    private function __construct()
    {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'tuyensinh';
        $this->__connect = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($this->__connect->connect_errno) {
            die('Không thể kết nối Cơ sở dữ liệu. Lỗi: ' . $this->__connect->connect_error);
        }
        if (!$this->__connect->set_charset('utf8')) {
            die('Không thể tải bảng mã utf8. Lỗi: ' . $this->__connect->error);
        }
    }
    
    private function __clone(){ }
    
    public static function getInstance()
    {
        if (null === self::$__instance) {
            self::$__instance = new self();
        }
        
        return self::$__instance;
    }
    
    public function queryCount()
    {
        return $this->__queryCount;
    }
    
    public function query($query)
    {
        $this->__reset();
        ++$this->__queryCount;
        $stmt = $this->__connect->query($query) or die('Lỗi: ' . $this->__connect->error);
        return $stmt;
    }
    
    private function __reset()
    {
    }
    
    public function insert_id()
    {
        return $this->__connect->insert_id;
    }
    
    public function affected_rows()
    {
        return $this->__connect->affected_rows;
    }
    
    public function fetch_assoc($result)
    {
        return $result->fetch_assoc();
    }
    
    public function num_rows($result)
    {
        return $result->num_rows;
    }
    
    public function result($result, $row, $column = 0)
    {
        if ($this->num_rows($result) > $row) {
            if ($row) {
                $result->data_seek($row);
            }
            $data = is_numeric($column) ? $result->fetch_row() : $result->fetch_assoc();
            if (isset($data[$column])) {
                return $data[$column];
            }
        }
        return false;
    }
    
    public function real_escape_string($str = '')
    {
        $str = trim($str);
        if (empty($str)) {
            return $str;
        }
        return $this->__connect->real_escape_string($str);
        
    }
    
    public function insert($table = '', $keys = array(), $values = array())
    {
        if ($table && is_array($keys) && !empty($keys)) {
            $insertKeys = '';
            $insertVals = array();
            if (is_array($values) && !empty($value)) {
                $insertKeys = '(`' . implode('`, `', $keys) . '`)';
                $countKey = count($key);
                foreach ($values as $v)
                {
                    if (count($v) === $countKey) {
                        $insertVals[] = '("' . implode('", "', array_map(array($this, 'real_escape_string'), $values)) . '")';
                    }
                }
            } else {
                $insertKeys = '(`' . implode('`, `', array_keys($keys)) . '`)';
                $insertVals[] = '("' . implode('", "', array_map(array($this, 'real_escape_string'), array_values($keys))) . '")';
            }
            if (count($insertVals)) {
                $sql = 'INSERT INTO `' . $table . '` ' . $insertKeys . ' VALUES ' . implode(', ', $insertVals) . '';
                return $this->query($sql);
            }
        }
    }
}
// Time Zone
date_default_timezone_set('Asia/Ho_Chi_Minh');

//Facebook Auth
$app_id = '1165592283892911';
$app_key = 'e83b22bd0557c0746f309f24f249c752';
?>