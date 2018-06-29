<?php
/*
 * Process.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
*/

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;

  class Process extends \ClicShopping\OM\PagesActionsAbstract  {
    public function execute() {
      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_StatsProductsNoViewed = Registry::get('StatsProductsNoViewed');

      $current_module = $this->page->data['current_module'];

      $m = Registry::get('StatsProductsNoViewedAdminConfig' . $current_module);

      foreach ($m->getParameters() as $key) {
        $p = strtolower($key);

        if (isset($_POST[$p])) {
          $CLICSHOPPING_StatsProductsNoViewed->saveCfgParam($key, $_POST[$p]);
        }
      }

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_StatsProductsNoViewed->getDef('alert_cfg_saved_success'), 'success', 'StatsProductsNoViewed');

      $CLICSHOPPING_StatsProductsNoViewed->redirect('Configure&module=' . $current_module);
    }
  }
