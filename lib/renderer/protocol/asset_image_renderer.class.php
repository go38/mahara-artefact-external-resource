<?php

/**
 * Process image resources. I.e. png, jpeg, etc.
 * 
 * @copyright (c) 2011 University of Geneva
 * @license GNU General Public License - http://www.gnu.org/copyleft/gpl.html
 * @author Laurent Opprecht
 */
class AssetImageRenderer extends AssetRenderer
{
    
    /**
     *
     * @param HttpResource $asset 
     */
    public function render($asset)
    {
        if (! $asset->is_image())
        {
            return false;
        }
        
        global $THEME;
        $url = $asset->url();
        $title = $asset->title();
        $title = $title ? $title : $asset->name();
        $embed = <<<EOT
        <a href="$url"><img src="{$url}" alt="{$title}" title="{$title}"></a>
EOT;

        $result = array();
        $result[self::URL] = $url;
        $result[self::EMBED_SNIPET] = $embed;
        $result[self::TITLE] = $title;
        $result[self::THUMBNAIL] = $url;
        return $result;
    }

}