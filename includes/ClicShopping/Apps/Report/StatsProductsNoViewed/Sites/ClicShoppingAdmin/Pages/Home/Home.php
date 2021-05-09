<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\Report\StatsProductsNoViewed\StatsProductsNoViewed;

  class Home extends \ClicShopping\OM\PagesAbstract
  {
    public $app;

    protected function init()
    {
      $CLICSHOPPING_StatsProductsNoViewed = new StatsProductsNoViewed();
      Registry::set('StatsProductsNoViewed', $CLICSHOPPING_StatsProductsNoViewed);

      $this->app = Registry::get('StatsProductsNoViewed');

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
