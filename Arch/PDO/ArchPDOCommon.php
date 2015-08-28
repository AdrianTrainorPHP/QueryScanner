<?php
namespace Arch\PDO;

/**
 * Class ArchPDOCommon
 * @package Arch\PDO
 */
class ArchPDOCommon
{

  /**
   * @var
   */
  protected $queryId;

  /**
   * @param $queryId
   */
  public function __construct($queryId)
  {
    $this->queryId = $queryId;
  }

  /**
   * @return string
   */
  protected function assignPointerString()
  {
    return 'query.' . $this->queryId;
  }

  public static function setLogReturnOutput($archLog)
  {
    ArchLog::set($archLog);
    return $archLog['output'];
  }
}