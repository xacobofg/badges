<?php
/*
 * @version $Id: HEADER 15930 2011-10-30 15:47:55Z tsmr $
 -------------------------------------------------------------------------
 badges plugin for GLPI
 Copyright (C) 2009-2016 by the badges Development Team.

 https://github.com/InfotelGLPI/badges
 -------------------------------------------------------------------------

 LICENSE

 This file is part of badges.

 badges is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 badges is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with badges. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

/**
 * Class PluginBadgesWizard
 *
 * This class shows the plugin main page
 *
 * @package    Badges
 * @author     Ludovic Dupont
 */
class PluginBadgesWizard extends CommonDBTM {

   static $rightname = "plugin_badges";

   /**
    * @param int $nb
    *
    * @return string|translated
    */
   static function getTypeName($nb = 0) {
      return __('Badges wizard', 'badges');
   }

   /**
    * Show config menu
    */
   function showMenu() {
      global $CFG_GLPI;

      if (!$this->canView()) {
         return false;
      }

      echo "<h3><div class='alert alert-secondary' role='alert'>";
      echo "<i class='fas fas fa-id-badge'></i>&nbsp;";
      echo  __("Access badge request", "badges");
      echo "</div></h3>";

      echo "<div align='center'>";
      echo "<table class='tab_cadre_fixe badges_wizard_rank' style='width: 400px;'>";
      echo "<tr class=''>";

      // Badge request
      echo "<td class='center'>";
      echo "<a  class='badges_menu_a' href=\"./wizard.form.php?action=badgerequest\">";
      echo "<i class='fas fa-id-badge fa-6x'></i>";
      echo "<br><br>" . __("Access badge request", "badges") . "<br>(" . __("For a limited time", "badges") . ")</a>";
      echo "</td>";

      // Badge return
      echo "<td class='center'>";
      echo "<a  class='badges_menu_a' href=\"./wizard.form.php?action=badgereturn\">";
      echo "<i class='fas fa-arrow-alt-circle-left fa-6x'></i>";
      echo "<br><br>" . __("Access badge return", "badges") . "</a>";
      echo "</td>";

      echo "</tr>";
      echo "</table></div>";
      return;
   }

   /**
    * Show wizard form of the current step
    *
    * @param $step
    */
   function showWizard($step) {

      switch ($step) {
         case 'badgerequest':
            $badgerequest = new PluginBadgesRequest();
            $badgerequest->showBadgeRequest();
            break;
         case 'badgereturn':
            $badgereturn = new PluginBadgesReturn();
            $badgereturn->showBadgeReturn();
            break;
      }

   }

}
