<?php
/*
 * Install.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
*/

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;

  use ClicShopping\OM\Cache;
  use ClicShopping\OM\CLICSHOPPING;

  class Install extends \ClicShopping\OM\PagesActionsAbstract {

    public function execute() {

      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_StatsProductsNoViewed = Registry::get('StatsProductsNoViewed');

      $current_module = $this->page->data['current_module'];

      $CLICSHOPPING_StatsProductsNoViewed->loadDefinitions('Sites/ClicShoppingAdmin/install');

      $m = Registry::get('StatsProductsNoViewedAdminConfig' . $current_module);
      $m->install();

      static::installDbMenuAdministration();

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_StatsProductsNoViewed->getDef('alert_module_install_success'), 'success', 'StatsProductsNoViewed');

      $CLICSHOPPING_StatsProductsNoViewed->redirect('Configure&module=' . $current_module);
    }

    private static function installDbMenuAdministration() {
      $CLICSHOPPING_Db = Registry::get('Db');
      $CLICSHOPPING_StatsProductsNoViewed = Registry::get('StatsProductsNoViewed');
      $CLICSHOPPING_Language = Registry::get('Language');
      $Qcheck = $CLICSHOPPING_Db->get('administrator_menu', 'app_code', ['app_code' => 'app_report_stats_products_no_viewed']);

      if ($Qcheck->fetch() === false) {

        $sql_data_array = ['sort_order' => 5,
                           'link' => 'index.php?A&Report\StatsProductsNoViewed&StatsProductsNoViewed',
                           'image' => 'stats_products_viewed.gif',
                           'b2b_menu' => 0,
                           'access' => 0,
                           'app_code' => 'app_report_stats_products_no_viewed'
                          ];

        $insert_sql_data = ['parent_id' => 98];

        $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

        $CLICSHOPPING_Db->save('administrator_menu', $sql_data_array);

        $id = $CLICSHOPPING_Db->lastInsertId();

        $languages = $CLICSHOPPING_Language->getLanguages();

        for ($i=0, $n=count($languages); $i<$n; $i++) {

          $language_id = $languages[$i]['id'];

          $sql_data_array = ['label' => $CLICSHOPPING_StatsProductsNoViewed->getDef('title_menu')];

          $insert_sql_data = ['id' => (int)$id,
                              'language_id' => (int)$language_id
                             ];

          $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

          $CLICSHOPPING_Db->save('administrator_menu_description', $sql_data_array );
        }

        Cache::clear('menu-administrator');
      }
    }
  }
