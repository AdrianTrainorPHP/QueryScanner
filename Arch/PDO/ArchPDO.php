<?php
namespace Arch\PDO;

/**
 * Class ArchPDO
 * @package Arch\PDO
 */
class ArchPDO extends ArchPDOCommon
{

  /**
   * @var \PDO
   */
  protected $PDO;

  /**
   * @var \PDOStatement
   */
  protected $PDOStatement;

  /**
   * @param string $dsn
   * @param string $user
   * @param string $pass
   * @param array $options
   */
  public function __construct($dsn, $user, $pass, $options = array())
  {
    $this->PDO      = new \PDO($dsn, $user, $pass, $options);
    parent::__construct(ArchLog::init());
  }

  /**
   * @return bool
   */
  public function beginTransaction()
  {
    $archLog = array(
      'method'  => 'PDO::beginTransaction',
      'input'   => array(),
      'output'  => $this->PDO->beginTransaction(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return bool
   */
  public function commit()
  {
    $archLog = array(
      'method'  => 'PDO::commit',
      'input'   => array(),
      'output'  => $this->PDO->commit(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return mixed
   */
  public function errorCode()
  {
    $archLog = array(
      'method'  => 'PDO::errorCode',
      'input'   => array(),
      'output'  => $this->PDO->errorCode(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return array
   */
  public function errorInfo()
  {
    $archLog = array(
      'method'  => 'PDO::errorInfo',
      'input'   => array(),
      'output'  => $this->PDO->errorInfo(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $statement
   * @return int
   */
  public function exec($statement)
  {
    $archLog = array(
      'method'  => 'PDO::exec',
      'input'   => array('statement' => $statement),
      'output'  => $this->PDO->exec($statement),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $attribute
   * @return mixed
   */
  public function getAttribute($attribute)
  {
    $archLog = array(
      'method'  => 'PDO::getAttribute',
      'input'   => array('attribute' => $attribute),
      'output'  => $this->PDO->getAttribute($attribute),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return array
   */
  public static function getAvailableDrivers()
  {
    $archLog = array(
      'method'  => 'PDO::getAvailableDrivers',
      'input'   => array(),
      'output'  => \PDO::getAvailableDrivers(),
      'pointer' => 'query.static'
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return bool
   */
  public function inTransaction()
  {
    $archLog = array(
      'method'  => 'PDO::inTransaction',
      'input'   => array(),
      'output'  => $this->PDO->inTransaction(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param null $name
   * @return string
   */
  public function lastInsertId($name = null)
  {
    $archLog = array(
      'method'  => 'PDO::lastInsertId',
      'input'   => array('name' => $name),
      'output'  => $this->PDO->lastInsertId($name),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $statement
   * @param array $driver_options
   * @return ArchPDOStatement
   */
  public function prepare($statement, $driver_options = array())
  {
    $this->PDOStatement = new ArchPDOStatement($this->PDO->prepare($statement, $driver_options), $this->queryId);

    $archLog = array(
      'method'  => 'PDO::prepare',
      'input'   => array('statement' => $statement, 'driver_options' => $driver_options),
      'output'  => 'Object PDOStatement',
      'pointer' => $this->assignPointerString()
    );
    ArchLog::set($archLog);
    return $this->PDOStatement;
  }

  /**
   * @param $statement
   * @return \PDOStatement
   */
  public function query($statement)
  {
    $archLog = array(
      'method'  => 'PDO::query',
      'input'   => array('statement' => $statement),
      'output'  => $this->PDO->query($statement),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return bool
   */
  public function rollBack()
  {
    $archLog = array(
      'method'  => 'PDO::rollBack',
      'input'   => array(),
      'output'  => $this->PDO->rollBack(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $attribute
   * @param $value
   * @return bool
   */
  public function setAttribute($attribute, $value)
  {
    $archLog = array(
      'method'  => 'PDO::setAttribute',
      'input'   => array('attribute' => $attribute, 'value' => $value),
      'output'  => $this->PDO->setAttribute($attribute, $value),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }
}