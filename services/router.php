<?php
/**
 * This is the class for routes instantiation.
 * A route is fetched by the URL path and determines:
 * 
 * * The page title
 * * The view to display on the page
 */
class Route {

  private string $title;
  private string $view;

  public function __construct( string $title, string $view ) {
    $this->title = $title;
    $this->view = $view;
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

}

/**
 * The Router is a static class that fetches the corresponding route
 * from the URL path.
 */
class Router {
  
  /**
   * Get the route instance from the current path
   * 
   * @return Route the Route instance
   */
  private static function get_route() {
    switch (str_replace(RELPATH, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
      /** Create your routes here */
      case '':
      case '/':
        return new Route('Home', 'home');
      default:
        return new Route('404 - Not Found', '404');
    }
  }

  /**
   * Insert the page title from the current path
   */
  public static function the_title() {
    echo Router::get_route()->get_title();
  }
  
  /**
   * Insert the page view from the current path
   */
  public static function the_view() {
    Router::get_route()->get_view();
  }

}

?>