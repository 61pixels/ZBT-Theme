<?php

class pixels_Navigation_Menu {
    private $home_page_id;
    private $depth = 0;
    private $root_id;
    private $source_page;
    public $nodes;
    public $node_reference;
    public $node_classes;

    public function __construct($source_page_id, $root_id = 0) {
        $this->home_page_id = get_option('page_on_front', false);
        $this->source_page_id = $source_page_id;
        $this->source_page = get_post($source_page_id);
        $this->root_id = $root_id;
        $this->build();
    }

    public function get_node($id) {
        return $this->node_reference[$id];
    }

    public function list_pages() {
        foreach ($this->nodes as $id => &$node) {  
			//echo '<li' . (is_page($id) ? ' class="root_level_page_item current_page_item' . '"' : ' class="root_level_page_item" ') . '>';
			echo '<li' . (is_page($id) ? ' class="root-' . $id . ' root_level_page_item current_page_item' . '"' : ' class="root-' . $id . ' root_level_page_item" ') . '>';
            echo '<a href="' . get_permalink($id) . '">' . get_the_title($id) . '</a>';
			echo '</li>';
                $this->list_children($node, 0);
        }
    }

    private function list_children(&$node, $depth) {
        foreach ($node as $id => &$children) {
            echo '<li' . ( isset($this->node_classes[$id]) && count($this->node_classes[$id]) ? (' class="' . implode(' ', $this->node_classes[$id]) . '"') : '') .'>';
            echo '<a href="' . get_permalink($id) . '">' . get_the_title($id).'</a>';

            if (count($children)) {
				echo '<ul class="children">';
                $this->list_children($children, $depth++);
				echo '</ul>';
            }
            echo '</li>';
        }
      
    }

    private function build() {
        global $wpdb;

        if ($this->source_page->post_parent) {
            $page_ids = array($this->source_page_id);
            $this->fill_page_ancestors($this->source_page_id, $page_ids);
            $root_id = array_pop($page_ids);
            
            $this->nodes = array();
            $this->node_reference = array();
            $this->node_classes = array();

            $this->nodes[$root_id] = array();
            $node = &$this->nodes[$root_id];

            $this->fill_page_tree($root_id, $page_ids, $node);

            $children = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish' AND menu_order >= 0 AND post_parent = %d ORDER BY menu_order, post_title", $this->source_page_id));

            $current_node = &$this->node_reference[$this->source_page_id];
            foreach ($children as $child) {
                $current_node [(int) $child] = array();
            }
            
        } else {
            
            
            $page_ids = array($this->source_page_id);
            
            //this is a root level page
            $this->nodes = array();
            $this->node_reference = array();
            $this->node_classes = array();

            $this->nodes[$this->source_page_id] = array();
            $node = &$this->nodes[$this->source_page_id];

            $this->fill_page_tree($this->source_page_id, $page_ids, $node);
            
            
            
        }
    }

    private function fill_page_ancestors($page_id, &$page_ids) {
        global $wpdb;
        $parent = $wpdb->get_var($wpdb->prepare("SELECT post_parent FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish' AND menu_order >= 0 AND ID = %d", $page_id));

        if ($parent) {
            $page_ids[] = (int) $parent;
            $this->fill_page_ancestors($parent, $page_ids);
        } elseif ($parent == 0) {
            
        }
    }

    private function fill_page_tree($parent_id, $ids, &$node) {
        global $wpdb;
        $children = $wpdb->get_results($wpdb->prepare("SELECT ID, menu_order FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish' AND menu_order >= 0 AND post_parent = %d ORDER BY menu_order, post_title", $parent_id), OBJECT_K);

        $next_node = false;
        $next_id = array_pop($ids);

        if ($children) {
            foreach ($children as $child => $data) {
                $this->node_classes[$child] = array();
				$this->node_classes[$child][] = 'item-' . $child;
                $node[$child] = array();
                if ($child == $next_id) {
                    
                    $this->node_classes[$child][] = 'current_page_parent';
                    if ($this->source_page_id == $child) {
                        $this->node_classes[$child][] = 'current_page_item';
                    }	
					
                    if ($data->menu_order < 0) {
                        $this->node_classes[$child][] = 'hidden';
                    }
					
					
                    $next_node = &$node[$child];
                    $this->node_reference[$child] = &$next_node;
                    $this->fill_page_tree($next_id, $ids, $next_node);
                }
            }
        }
    }

}

?>