<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed;

  use ClicShopping\OM\Registry;
  use ClicShopping\OM\CLICSHOPPING;

  class StatsProductsNoViewed extends \ClicShopping\OM\AppAbstract
  {

    protected $api_version = 1;
    protected $identifier = 'ClicShopping_StatsProductsNoViewed_V1';

    protected function init()
    {
    }

    public function getConfigModules()
    {
      static $result;

      if (!isset($result)) {
        $result = [];

        $directory = CLICSHOPPING::BASE_DIR . 'Apps/Report/StatsProductsNoViewed/Module/ClicShoppingAdmin/Config';

        if ($dir = new \DirectoryIterator($directory)) {
          foreach ($dir as $file) {
            if (!$file->isDot() && $file->isDir() && is_file($file->getPathname() . '/' . $file->getFilename() . '.php')) {
              $class = 'ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\\' . $file->getFilename() . '\\' . $file->getFilename();

              if (is_subclass_of($class, 'ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\ConfigAbstract')) {
                $sort_order = $this->getConfigModuleInfo($file->getFilename(), 'sort_order');
                if ($sort_order > 0) {
                  $counter = $sort_order;
                } else {
                  $counter = \count($result);
                }

                while (true) {
                  if (isset($result[$counter])) {
                    $counter++;

                    continue;
                  }

                  $result[$counter] = $file->getFilename();

                  break;
                }
              } else {
                trigger_error('ClicShopping\Apps\Report\StatsProductsNoViewed\StatsProductsNoViewed::getConfigModules(): ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\\' . $file->getFilename() . '\\' . $file->getFilename() . ' is not a subclass of ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\ConfigAbstract and cannot be loaded.');
              }
            }
          }

          ksort($result, SORT_NUMERIC);
        }
      }

      return $result;
    }

    public function getConfigModuleInfo($module, $info)
    {
      if (!Registry::exists('StatsProductsNoViewedAdminConfig' . $module)) {
        $class = 'ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\\' . $module . '\\' . $module;

        Registry::set('StatsProductsNoViewedAdminConfig' . $module, new $class);
      }

      return Registry::get('StatsProductsNoViewedAdminConfig' . $module)->$info;
    }


    public function getApiVersion()
    {
      return $this->api_version;
    }

    public function getIdentifier()
    {
      return $this->identifier;
    }
  }
