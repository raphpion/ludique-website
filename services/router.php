<?php
/**
 * This is the class for routes instantiation.
 * A route is fetched by the URL path and determines:
 * 
 * * The page title
 * * The view to display on the page
 */
class Route {

  private $title;
  private $view;
  private $slug;
  private $in_navbar;

  /**
   * Constructor
   * 
   * @param title the title to be displayed in the 'title' tag
   * @param view the view filename
   * @param slug the route's slug; defaults to the view filename
   * @param in_navbar wether the link should be included in the navbar or not; defaults to false
   */
  public function __construct( $title, $view, $slug = null, $in_navbar = false ) {
    $this->title = $title;
    $this->view = $view;
    if ( is_null( $slug ) ) $this->slug = $view;
    else $this->slug = $slug;
    $this->in_navbar = $in_navbar;
  }

  /**
   * Getters
   */
  public function get_title() {
    return $this->title;
  }

  public function get_view() {
    require ABSPATH . '/views/' . $this->view . '.php';
  }

  public function get_slug() {
    return $this->slug;
  }

  public function in_navbar() {
    return $this->in_navbar;
  }

  /**
   * Echoers
   */
  public function the_title() {
    echo $this->get_title();
  }

  public function the_permalink() {
    echo WEBSITE_URL . $this->get_slug();
  }

}

/**
 * The Router is a static class that fetches the corresponding route
 * from the URL path.
 */
class Router {

  private static $routes = array();
  private static $default_route;
  
  /**
   * Get the route instance from the current path
   * 
   * @return Route the Route instance
   */
  public static function get_route() {
    $path = str_replace( RELPATH, '', parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) );
    foreach (Router::$routes as $route)
      if ($route->get_slug() == $path) return $route;
    return Router::$default_route;
  }

  /**
   * Get all the routes
   */
  public static function get_routes() {
    return Router::$routes;
  }

  /**
   * Checks if the home route is being rendered
   * 
   * @return Boolean if the home route is being rendered
   */
  public static function is_home_route() {
    if ( Router::get_route()->get_title() == 'Home' ) return true;
    return false;
  }

  /**
   * Get the page title from the current path
   * @return String the route title
   */
  public static function get_the_title() {
    return Router::get_route()->get_title();
  }

  /**
   * Insert the page title from the current path
   */
  public static function the_title() {
    echo Router::get_the_title();
  }
  
  /**
   * Insert the page view from the current path
   */
  public static function the_view() {
    Router::get_route()->get_view();
  }

  /**
   * Add a route to the router's route array
   */
  public static function add_route( $route ) {
    array_push( Router::$routes, $route );
  }

  /**
   * Add an array of routes to the router's route array
   */
  public static function add_routes( $routes ) {
    foreach ( $routes as $route )
      Router::add_route( $route );
  }

  /**
   * Set the default route (404)
   */
  public static function set_default_route ( $route ) {
    Router::$default_route = $route; 
  }

}

/** Create your routes here. */
Router::add_routes( array(
  new Route('Home', 'home', '/', true),
) );

/** Set the default route here. */
Router::set_default_route( new Route( '404', '404', '*' ) );


?>