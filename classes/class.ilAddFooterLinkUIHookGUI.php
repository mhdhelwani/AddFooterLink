<?php
include_once("./Services/UIComponent/classes/class.ilUIHookPluginGUI.php");
include_once('class.ilAddFooterLinkPlugin.php');
include_once('class.ilAddFooterLinkPlugin.php');

class ilAddFooterLinkUIHookGUI extends ilUIHookPluginGUI
{
    /**
     * Get html for a user interface area
     *
     * @param
     * @param
     * @param array
     * @return array
     */
    function getHTML($a_comp, $a_part, $a_par = array())
    {
        if ($a_par["tpl_id"] === "Services/UICore/tpl.footer.html" && $a_part == "template_get") {
            $this->plugin = new ilAddFooterLinkPlugin();
            $html = $a_par["html"];
            $separator = "";
            $item_separator = $a_par["tpl_obj"]->blocklist["item_separator"];

            if (!(substr(trim($html), -2) === rtrim($item_separator))) {
                $separator = $item_separator;
            }

            return array("mode" => ilUIHookPluginGUI::APPEND, "html" => $separator . "<a href='http://wiki.llz.uni-halle.de/Portal:E-Plattform' target='_blank'>" . $this->plugin->txt("title") . "</a>");
        }
        return array("mode" => ilUIHookPluginGUI::KEEP, "html" => "");
    }
}
?>
