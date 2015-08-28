<?php
namespace Arch\PDO;

/**
 * Class ArchPDOStatement
 * @package Arch\PDO
 */
class ArchPDOStatement extends ArchPDOCommon
{
  /**
   * @var \PDOStatement
   */
  public $PDOStatement;

  /**
   * @param \PDOStatement $PDOStatement
   * @param $queryId
   */
  public function __construct(\PDOStatement $PDOStatement, $queryId)
  {
    $this->PDOStatement = $PDOStatement;
    parent::__construct($queryId);
    return $this;
  }

  /**
   * @param $column
   * @param $param
   * @param null $type
   * @param null $maxlen
   * @param null $driverdata
   * @return bool
   */
  public function bindColumn ($column, &$param, $type = null, $maxlen = null, $driverdata = null)
  {
    $archLog = array(
      'method'  => 'PDOStatement::bindColumn',
      'input'   => array(
        'column'      => $column,
        'param'       => $param,
        'type'        => $type,
        'maxlen'      => $maxlen,
        'driverdata'  => $driverdata
      ),
      'output'  => $this->PDOStatement->bindColumn($column, $param, $type, $maxlen, $driverdata),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $parameter
   * @param $variable
   * @param int $data_type
   * @param null $length
   * @param null $driver_options
   * @return bool
   */
  public function bindParam ($parameter, &$variable, $data_type = \PDO::PARAM_STR, $length = null, $driver_options = null)
  {
    $archLog = array(
      'method'  => 'PDOStatement::bindParam',
      'input'   => array(
        'parameter'       => $parameter,
        'variable'        => $variable,
        'data_type'       => $data_type,
        'length'          => $length,
        'driver_options'  => $driver_options
      ),
      'output'  => $this->PDOStatement->bindParam ($parameter, $variable, $data_type, $length, $driver_options),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $parameter
   * @param $value
   * @param int $data_type
   * @return bool
   */
  public function bindValue ($parameter, $value, $data_type = \PDO::PARAM_STR)
  {
    $archLog = array(
      'method'  => 'PDOStatement::bindValue',
      'input'   => array(
        'parameter' => $parameter,
        'value'     => $value,
        'data_type' => $data_type
      ),
      'output'  => $this->PDOStatement->bindValue($parameter, $value, $data_type),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return bool
   */
  public function closeCursor()
  {
    $archLog = array(
      'method'  => 'PDOStatement::closeCursor',
      'input'   => array(),
      'output'  => $this->PDOStatement->closeCursor(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return int
   */
  public function columnCount()
  {
    $archLog = array(
      'method'  => 'PDOStatement::columnCount',
      'input'   => array(),
      'output'  => $this->PDOStatement->columnCount(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   *
   */
  public function debugDumpParams()
  {
    $archLog = array(
      'method'  => 'PDOStatement::debugDumpParams',
      'input'   => array(),
      'output'  => '',
      'pointer' => $this->assignPointerString()
    );
    ArchLog::set($archLog);
    $this->PDOStatement->debugDumpParams();
  }

  /**
   * @return string
   */
  public function errorCode()
  {
    $archLog = array(
      'method'  => 'PDOStatement::errorCode',
      'input'   => array(),
      'output'  => $this->PDOStatement->errorCode(),
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
      'method'  => 'PDOStatement::errorInfo',
      'input'   => array(),
      'output'  => $this->PDOStatement->errorInfo(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param array $input_parameters
   * @return bool
   */
  public function execute ($input_parameters = NULL)
  {
    $archLog = array(
      'method'  => 'PDOStatement::execute',
      'input'   => array('input_parameters' => $input_parameters),
      'output'  => $this->PDOStatement->execute($input_parameters),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param null $fetch_style
   * @param int $cursor_orientation
   * @param int $cursor_offset
   * @return mixed
   */
  public function fetch ($fetch_style = null, $cursor_orientation = \PDO::FETCH_ORI_NEXT, $cursor_offset = 0)
  {
    $archLog = array(
      'method'  => 'PDOStatement::fetch',
      'input'   => array(
        'fetch_style'         => $fetch_style,
        'cursor_orientation'  => $cursor_orientation,
        'cursor_offset'       => $cursor_offset
      ),
      'output'  => $this->PDOStatement->fetch($fetch_style, $cursor_orientation, $cursor_offset),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param null $fetch_style
   * @param null $fetch_argument
   * @param array $ctor_args
   * @return array
   */
  public function fetchAll ($fetch_style = null, $fetch_argument = null, array $ctor_args = null)
  {
    $archLog = array(
      'method'  => 'PDOStatement::fetchAll',
      'input'   => array(
        'fetch_style'     => $fetch_style,
        'fetch_argument'  => $fetch_argument,
        'ctor_args'       => $ctor_args
      ),
      'output'  => $this->PDOStatement->fetchAll($fetch_style, $fetch_argument, $ctor_args),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param int $column_number
   * @return string
   */
  public function fetchColumn ($column_number = 0)
  {
    $archLog = array(
      'method'  => 'PDOStatement::fetchColumn',
      'input'   => array('column_number' => $column_number),
      'output'  => $this->PDOStatement->fetchColumn($column_number),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param string $class_name
   * @param array $ctor_args
   * @return mixed
   */
  public function fetchObject ($class_name = "stdClass", array $ctor_args = null)
  {
    $archLog = array(
      'method'  => 'PDOStatement::fetchObject',
      'input'   => array('class_name' => $class_name, 'ctor_args' => $ctor_args),
      'output'  => $this->PDOStatement->fetchObject($class_name, $ctor_args),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param int $attribute
   * @return mixed
   */
  public function getAttribute($attribute)
  {
    $archLog = array(
      'method'  => 'PDOStatement::getAttribute',
      'input'   => array('attribute' => $attribute),
      'output'  => $this->PDOStatement->getAttribute($attribute),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param $column
   * @return array
   */
  public function getColumnMeta($column)
  {
    $archLog = array(
      'method'  => 'PDOStatement::getColumnMeta',
      'input'   => array('column' => $column),
      'output'  => $this->PDOStatement->getColumnMeta($column),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return bool
   */
  public function nextRowset()
  {
    $archLog = array(
      'method'  => 'PDOStatement::nextRowset',
      'input'   => array(),
      'output'  => $this->PDOStatement->nextRowset(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @return int
   */
  public function rowCount()
  {
    $archLog = array(
      'method'  => 'PDOStatement::rowCount',
      'input'   => array(),
      'output'  => $this->PDOStatement->rowCount(),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param int $attribute
   * @param mixed $value
   * @return bool
   */
  public function setAttribute($attribute, $value)
  {
    $archLog = array(
      'method'  => 'PDOStatement::setAttribute',
      'input'   => array('attribute' => $attribute, 'value' => $value),
      'output'  => $this->PDOStatement->setAttribute($attribute, $value),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

  /**
   * @param int $mode
   * @return bool
   */
  public function setFetchMode($mode)
  {
    $archLog = array(
      'method'  => 'PDOStatement::setFetchMode',
      'input'   => array('mode' => $mode),
      'output'  => $this->PDOStatement->setFetchMode($mode),
      'pointer' => $this->assignPointerString()
    );
    return self::setLogReturnOutput($archLog);
  }

}