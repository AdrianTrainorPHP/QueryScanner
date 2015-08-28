<?php
namespace Arch\PDO;

/**
 * Class ArchLog
 * @package Arch\PDO
 */
class ArchLog
{

  public static function init()
  {
    if (!isset($GLOBALS['arch'])) {
      $GLOBALS['arch'] = array(array());
      return 0;
    }

    $GLOBALS['arch'][] = array();
    return (count($GLOBALS['arch'])-1);
  }

  /**
   * @param array $options
   * @return bool
   */
  public static function set($options)
  {
    $valid          = false;
    $pointer        = explode('.', $options['pointer']);
    $countPointers  = count($pointer);

    if (!isset($GLOBALS['arch'])) {
      $GLOBALS['arch'] = array();
    }

    if (!isset($GLOBALS['arch'][$pointer[0]])) {
      $GLOBALS['arch'][$pointer[0]] = array();
    }

    if ($countPointers > 1) {

      if (!isset($GLOBALS['arch'][$pointer[0]][$pointer[1]])) {
        $GLOBALS['arch'][$pointer[0]][$pointer[1]] = array();
      }

      if ($countPointers > 2) {

        if (!isset($GLOBALS['arch'][$pointer[0]][$pointer[1]][$pointer[2]])) {
          $GLOBALS['arch'][$pointer[0]][$pointer[1]][$pointer[2]] = array();
        }

      }

    }

    switch($countPointers) {

      case 1:
        $GLOBALS['arch'][$pointer[0]][] = $options['method'] . ' > ' . $options['value'];
        $valid = true;
        break;

      case 2:
        $GLOBALS['arch'][$pointer[0]][$pointer[1]][] = $options['method'] . ' > ' . $options['value'];
        $valid = true;
        break;

      case 3:
        $GLOBALS['arch'][$pointer[0]][$pointer[1]][$pointer[2]][] = $options['method'] . ' > ' . $options['value'];
        $valid = true;
        break;
    }

    return $valid;
  }

  /**
   * @param $pointer
   * @return bool | string
   */
  public static function remove($pointer)
  {
    return self::getAndOrRemove($pointer, true);
  }

  /**
   * @param $pointer
   * @param bool $reset
   * @return bool | string
   */
  public static function get($pointer, $reset = false)
  {
    return self::getAndOrRemove($pointer, $reset);
  }

  public static function output()
  {

  }

  /**
   * @param $pointer
   * @param bool $reset
   * @return bool | string
   */
  public static function getAndOrRemove($pointer, $reset = false)
  {
    $pointer = explode('.', $pointer);
    $returnValue = false;

    switch(count($pointer)) {

      case 1:
        if (isset($GLOBALS['arch'][$pointer[0]])) {
          $returnValue = $GLOBALS['arch'][$pointer[0]];
          if ($reset) {
            unset($GLOBALS['arch'][$pointer[0]]);
          }
        }
        break;

      case 2:
        if (isset($GLOBALS['arch'][$pointer[0]][$pointer[1]])) {
          $returnValue = $GLOBALS['arch'][$pointer[0]][$pointer[1]];
          if ($reset) {
            unset($GLOBALS['arch'][$pointer[0]][$pointer[1]]);
          }
        }
        break;

      case 3:
        if (isset($GLOBALS['arch'][$pointer[0]][$pointer[1]][$pointer[2]])) {
          $returnValue = $GLOBALS['arch'][$pointer[0]][$pointer[1]][$pointer[2]];
          if ($reset) {
            unset($GLOBALS['arch'][$pointer[0]][$pointer[1]][$pointer[2]]);
          }
        }
        break;
    }

    return $returnValue;
  }
}